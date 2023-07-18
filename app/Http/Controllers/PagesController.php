<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller{
    public function index(){
        return view("home", [
            "title" => "Home",
            "active" => "home"
        ]);
    }

    public function about(){
        return view("about", [
            "title" => "About",
            "name" => "Rahmat Fauzi Widianto",
            "image" => "rahmat.jpg",
            "active" => "about"
        ]);
    }
}