<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
class IndexController extends Controller
{
    public function index() {
        $title ='Spot - Bootstrap Freelance Template';
        $articles= Article::all();
        
        dump($articles);
        return view('page')->with(['title'=>$title,'articles'=>$articles]);
    }
}
