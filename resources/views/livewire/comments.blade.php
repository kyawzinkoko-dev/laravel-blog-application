{{-- $post coming comments component mount method --}}
<div>
    <livewire:comment-create :post="$post" wire:listen="commentCreated"/>
    <div>
       
        @foreach ($comments as $comment)
        
            <livewire:comment-item :comment="$comment" wire:key="comment-{{ $comment->id }}"/>
      
        @endforeach
    </div>
    
</div>
