<x-app-layout>
    <div class=" flex">
        <section class="w-full md:w-2/3  px-3">

            @foreach ($posts as $post)
                <div class="max-w-4xl mx-auto">
                    <a href="{{ route('view', $post) }}">
                        <h2 class="text-blue-500 font-bold text-lg sm:text-xl mb-2">
                            {!! str_replace(request()->get('q'), '<span class="bg-yellow-300">'.request()->get('q').'</span>', $post->title) !!}
                        </h2>
                    </a>
                    <p>{!! $post->searchBody(request()->get('q'),50) !!}</p>
                </div>
                <hr class="my-4">
            @endforeach



            {{ $posts->links() }}

        </section>
        <x-side-bar />
    </div>

</x-app-layout>
