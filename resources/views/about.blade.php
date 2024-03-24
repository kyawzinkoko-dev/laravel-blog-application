<x-app-layout meta-title="About Blog" meta-description="meta about page">


<article class="">
    <!-- Article Image -->
   
    <a href="#" class="hover:opacity-75">
        <img src="/storage/{{$widgets->image}}" class="w-full">
    </a>
    <div class="bg-white flex flex-col justify-start p-6">
        
        <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{$widgets->title}}</a>
       
        
        <p class="pb-3">{!!$widgets->content!!}</p>
        
        
    
   
</article>
</x-app-layout>
