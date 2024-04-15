{{-- $post coming comments component mount method --}}
<div class="mb-8">
    <livewire:comment-create :post="$post" wire:listen="commentCreated"/>
    <div>
       
        @foreach ($comments as $comment)
        
            <livewire:comment-item :comment="$comment" wire:key="comment-{{ $comment->id }}-{{$comment->comments->count()}}"/>
      
        @endforeach
    </div>

</div>
