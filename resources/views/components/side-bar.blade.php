

<aside class="w-full md:w-1/3 flex flex-col items-center px-3">
    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <h3 class="font-semibold text-lg">All Categories</h3>
        {{-- categories comming from SideBar comopnent --}}
        @foreach ($categories as $category)
            <a href="{{ route('by-category',$category)}}"  class="py-1 transition-color px-2 rounded {{request('category')?->slug === $category->slug ? 'bg-blue-600 text-white' :''}}">{{$category->title}} ({{$category->total}})</a>
        @endforeach
    </div>
    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <p class="text-xl font-semibold pb-5">{!!App\Models\TextWidget::gettitle('About us ')!!}</p>
        <p class="pb-2">{!!App\Models\TextWidget::getContent('About us ')
            !!}</p>
        <a href="{{route('about-us')}}" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
            Get to know us
        </a>
    </div>

   

</aside>