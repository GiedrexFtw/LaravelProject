<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title="Welcome to the homepage!";
        //return view('pages.index', compact('title'));
        return view('pages.index')->with("title", $title);
    }
    public function about(){
        return view('pages.about');
    }
    public function services(){
        $data=[
            "title" => "The services our app provides:",
            "services" => ["Adding events", "Removing events", "Checking out events"]
        ];
        return view('pages.services')->with($data);
    }
    //
}
