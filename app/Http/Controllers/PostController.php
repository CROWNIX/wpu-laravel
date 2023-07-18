<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller{
    public function index(){
        $title = "";
        if(request("category")){
            $category = Category::firstWhere("slug", request("category"));
            $title = " In " . $category->name;
        }

        if(request("author")){
            $author = User::firstWhere("username", request("author"));
            $title = " By : " . $author->name;
        }

        return view("posts", [
            "title" => "All Posts $title",
            // "posts" => Post::all()
            "posts" => Post::latest()->filter(request(["search", "category", "author"]))->paginate(7)->withQueryString(),
            "active" => "posts"
        ]);
    }

    public function post(Post $post){
        return view("post", [
            "title" => "Single post",
            "post" => $post,
            "active" => "posts"
        ]);
    }

    public function categories(){
        return view("categories", [
            "title" => "Post Categories",
            "categories" => Category::all(),
            "active" => "categories"
        ]);
    }
}