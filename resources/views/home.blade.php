<x-app-layout meta-description="My Personnal Blog about Technology">
    <div class="container mx-auto max-w-5xl py-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-9 mb-8">
            <!-- Latest Post -->
            <div class="col-span-2">
                <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                    Latest Post
                </h2>
                <x-post-item :post="$latestPost"></x-post-item>
            </div>

            <!-- Popular 3 post -->
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                    Popular Posts
                </h2>
                @foreach ($popularPosts as $post)
                    <div class="grid grid-cols-4 gap-2 mb-4">
                        <a href="{{route('view',$post)}}" class="pt-1">
                            <img src="{{ $post->getThumbnail() }}" alt="{{ $post->title }}" />

                        </a>
                        <div class=" col-span-3">
                            <a href="{{route("view",$post)}}"><h3 class="font-semibold uppercase whitespace-nowrap truncate">{{ $post->title }}</h3></a>
                            
                            <p class="text-xs">{{ $post->shortBody(10) }}</p>
                            @if ($post->categories)
                                <div class="flex items-center gap-2 mb-2">
                                    @foreach ($post->categories as $category)
                                        <a href="{{ route('by-category', $category) }}"
                                            class="bg-blue-500 text-sm hover:bg-blue-700 text-white rounded p-1">{{ $category->title }}</a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- Recommand posts --}}

        <div>
            <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                Recommand Posts
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($recommandPosts as $post)
                    <x-post-item :post="$post" :showAuthor="false"></x-post-item>
                @endforeach
            </div>
        </div>
        {{-- latest categories --}}
        <div>

        </div>
    </div>
    {{-- <section class="w-full md:w-2/3 flex flex-col items-center px-3">

        @foreach ($posts as $post)
       
        <x-post-item :post="$post"></x-post-item>
        @endforeach
        
        {{$posts->links()}}
       
        <div class="w-full flex flex-col text-center md:text-left md:flex-row shadow bg-white mt-10 mb-10 p-6">
            <div class="w-full md:w-1/5 flex justify-center md:justify-start pb-4">
                <img src="https://source.unsplash.com/collection/1346951/150x150?sig=1" class="rounded-full shadow h-32 w-32">
            </div>
            <div class="flex-1 flex flex-col justify-center md:justify-start">
                <p class="font-semibold text-2xl">David</p>
                <p class="pt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel neque non libero suscipit suscipit eu eu urna.</p>
                <div class="flex items-center justify-center md:justify-start text-2xl no-underline text-blue-800 pt-4">
                    <a class="" href="#">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>
    
    </section>
    <x-side-bar/> --}}
</x-app-layout>
