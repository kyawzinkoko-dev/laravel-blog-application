<?php

namespace App\Livewire;

use Livewire\Component;

class CommentCreate extends Component
{
    public string $comment='';
    public function render()
    {
        return view('livewire.comment-create');
    }
    public function createComment(){
        echo "test";
    }
}
