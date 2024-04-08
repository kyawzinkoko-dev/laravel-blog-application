<div>
    <div  x-data="{
        focus: false
    }">
       {{dd($comment)}}
        {{-- The best athlete wants his opponent at his best. --}}
        <textarea wire:model="comment"  @click="focus=true" :rows="focus ? '5' : ''" placeholder="Leave a comment"
            class="block w-full focus:border-violet-500 mb-3 focus:outline-none focus:ring-2 focus:ring-violet-500 rounded text-gray-500"></textarea>
        <div :class="focus ? '' : 'hidden'">
            <button wire:click="createComment"  type="button"
                class="py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Submit</button>
            <button type="button" @click="focus =false"
                class="py-2 px-3 text-blue-500  border border-blue-500 hover:bg-blue-50 rounded">Cancel</button>
        </div>
    </div>

</div>
