<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view("dashboard.posts.index", [
            "posts" => Post::where("user_id", auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view("dashboard.posts.create", [
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validatedData = $request->validate([
            "title" => "required|max:255",
            "slug" => "required|unique:posts",
            "category_id" => "required",
            "image" => "image|file|max:1024",
            "body" => "required"
        ]);

        if($request->file("image")){
            $validatedData["image"] = $request->file("image")->store("post-images");
        }

        $validatedData["user_id"] = auth()->user()->id;
        $validatedData["excerpt"] = Str::limit(strip_tags($request->body), 100);

        Post::create($validatedData);

        return redirect("/dashboard/posts")->with("success", "New post has beed added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post){
        if(auth()->user()->id != $post->author->id){
            return redirect("/dashboard");
        }

        return view("dashboard.posts.show", [
            "post" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post){
        if(auth()->user()->id != $post->author->id){
            return redirect("/dashboard");
        }
        
        return view("dashboard.posts.edit", [
            "categories" => Category::all(),
            "post" => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post){
        $rules = [
            "title" => "required|max:255",
            "category_id" => "required",
            "image" => "image|file|max:1024",
            "body" => "required"
        ];

        if($post->slug != $request->slug){
            $rules["slug"] = "required|unique:posts";
        }


        $validatedData = $request->validate($rules);
        if($request->file("image")){
            if($post->image){
                Storage::delete($post->image);
            }
            
            $validatedData["image"] = $request->file("image")->store("post-images");
        }

        // Post::where("id", $post->id)
        //     ->update($validatedData);
        $post->update($validatedData);

        return redirect("/dashboard/posts")->with("success", "Post has beed updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post){
        // Post::destroy($post->id);
        if($post->image){
            Storage::delete($post->image);
        }
        
        $post->delete();

        return redirect("/dashboard/posts")->with("success", "Post has beed deleted");
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, "slug", $request->title);
        return response()->json(["slug" => $slug]);
    }
}