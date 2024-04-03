<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostView;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
       //latest 3 post


       //most popular 3 post based on upvote

       //if authorized - show recommand pots base on user upvote

       //if not authorized - show popular post based on views

       //show recent categories with their latest post 
        
        // $posts = Post::query()
        //     ->where('active', '=', 1)
        //     ->whereDate('published_at', '<', Carbon::now())
        //     ->orderBy('published_at', 'desc')
        //     ->paginate(10);
        
         return view('home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post,Request $request)
    {
         if(!$post->active || $post->published_at > Carbon::now()){
              throw new NotFoundHttpException();
         }
         $next = Post::query()
         ->where('active','=',1)
         ->whereDate('published_at','<=',Carbon::now())
         ->whereDate('published_at','<',$post->published_at)
         ->orderBy('published_at','desc')
         ->limit(1)
         ->first();

         $prev = Post::query()
         ->where('active','=',1)
         ->whereDate('published_at','<=',Carbon::now())
         ->whereDate('published_at','>',$post->published_at)
         ->orderBy('published_at','asc')
         ->limit(1)
         ->first();
        
         /**
          * create view count for post, if the same device view the same post withing 2 hours, the new  view will not added 
          *  
          */
         $user = $request->user;
         $currentTime = Carbon::now();
         $threeHourAgo = $currentTime->subHours(2);
         $exisingView = PostView::where('post_id','=',$post->id)
         ->where('ip_address',$request->ip())
         ->where('created_at','>',$threeHourAgo)
         ->first();
         if(!$exisingView){
            PostView::create([
                'ip_address'=>$request->ip(),
                'user_agent'=>$request->userAgent(),
                'post_id'=>$post->id,
                'user_id'=>$user?->id,
             ]);
         }
        

        return view('posts.view',compact('post','next','prev'));
    }

   //**  Post by Categories */
   public function byCategory(Category $category){
       
        $posts = Post::query()
        ->join('category_post','posts.id','=','category_post.post_id')
         ->where('category_post.category_id','=',$category->id)
        ->where('active','=',1)
        ->whereDate('published_at','<=',Carbon::now())
        ->orderBy('published_at','desc')
        ->paginate(10);
        return view('posts.index',compact('posts','category'));
   }
}
