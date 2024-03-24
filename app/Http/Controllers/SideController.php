<?php

namespace App\Http\Controllers;

use App\Models\TextWidget;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SideController extends Controller
{
    public function about() 
    {
        $widgets = TextWidget::query()
        ->where('active',1)
        ->first();
        if(!$widgets){
            throw new NotFoundHttpException();
        }
        return view('about',compact('widgets'));

    }
}
