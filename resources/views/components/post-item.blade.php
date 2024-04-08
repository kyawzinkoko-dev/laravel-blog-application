<article class="flex flex-col shadow my-4">
    <!-- Article Image -->
   
    <a href="{{route('view',$post)}}" class="hover:opacity-75">
        <img src="{{ $post->getThumbnail()}}" alt="{{$post->title}}" class=" aspect-[4/3] object-contain">
        
    </a>
    <div class="bg-white flex flex-col justify-start p-6">
        <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">@foreach ($post->categories as $category)
            {{$category->title}}
        @endforeach</a>
        <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{$post->title}}</a>
       @if ($showAuthor)
       <p href="#" class="text-sm pb-8">
        By <a href="#" class="font-semibold hover:text-gray-800">{{$post->user->name}}</a>, Published on {{$post->getFormattedDate()}}
    </p>
       @endif
        <p class="pb-3">{{$post->shortBody()}}</p>
        <a href="{{route('view',$post)}}" class="uppercase "><div class="flex items-center py-2 px-3 text-gray-800 hover:text-black w-auto"> Cotinue reading <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
          </svg>
        </div>
          </a>
       
    
   
</article>
