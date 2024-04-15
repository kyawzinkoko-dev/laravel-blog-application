<div>


    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="flex justify-between  gap-4 mt-5">
        <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center"><svg
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
        </div>

        <div class=" flex-1">
            <div> <a href="" class="text-blue-500 font-semi">{{ $comment->user->name }}</a>
                - <span class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</span></div>
            @if ($editing)
                <livewire:comment-create :comment-model="$comment" />
            @else
                <div class="text-gray-800">{{ $comment->comment }}</div>
            @endif

            <div class="flex items-center gap-3">
                <a wire:click.prevent="startReply" href="" class="text-blue-500 text-sm">Reply</a>
                <a wire:click.prevent="startCommentEdit" href="#" class="text-orange-500 text-sm">Edit</a>
                <a wire:click.prevent="deleteComment" href="" class="text-red-500 text-sm">Delete</a>
            </div>
            @if ($replying)
                <livewire:comment-create :post="$comment->post" :parentComment="$comment" />
            @endif
            @if ($comment->comments->count())
                @foreach ($comment->comments as $childComment)
                    <livewire:comment-item :comment="$childComment" wire:key="comment-{{ $childComment->id }}" />
                @endforeach
            @endif
        </div>

    </div>
</div>
