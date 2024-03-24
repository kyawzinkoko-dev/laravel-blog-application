<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function __construct(public ?string $metaTitle=null  ,public ?string $metaDescription=null)
    {
        
    }


    public function render(): View|Closure|string
    {
        $categories = Category::query()
        ->join('category_post','categories.id','=','category_post.category_id')
        ->select('categories.title','categories.slug',DB::raw('count(*) as total'))
        ->groupBy('categories.id')
        ->orderBy('title')
        ->get();
        return view('layouts.app',compact('categories'));
    }
}
