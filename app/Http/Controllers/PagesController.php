<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return "jsjsjsj";
    }
    public function name(){
        $title = "this is title";
        // return view('pages.index' , compact("title"))
        return view('pages.index')->with('myt',$title);
    }
    public function about(){
        return view('pages.about');
    }
    public function services(){
        $data = array(
            'mytitle' => "Services",
            'paragraph' => "This is very fun, I like it very much lol xD",
            'items'=>['item one','item two','item three','item four','item five']
        );
        return view('pages.services')->with($data);

    }
}
