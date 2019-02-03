<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $title ='Сука - Spot - Bootstrap Freelance Template';
        $name="Имя";
        return view('page')->with(['title'=>$title,'name'=>$name]);
    }
}
