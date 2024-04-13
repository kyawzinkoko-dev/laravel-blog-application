<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Component;

class Comments extends Component
{

    public Post $post;
    public  Collection $comments;
    protected $listeners = [
        'commentCreated' => 'commentCreated',
        'commentDeleted' => 'commentDeleted'
    ];
    public function mount(Post $post)
    {
        $this->post = $post;
    }
    public function render()
    {

        $this->comments = Comment::where('post_id', '=', $this->post->id)->orderByDesc('created_at')->get();

        return view('livewire.comments');
    }

    public function commentCreated(int $id)
    {
        $comment = Comment::where('id', '=', $id)->first();

        $this->comments = collect([$comment])->concat($this->comments);
    }
    public function commentDeleted(int $id)
    {
        $this->comments = $this->comments->reject(function ($comment) use ($id) {
            return $comment->id == $id;
        });
    }
}
