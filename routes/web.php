<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [PagesController::class, "index"]);
Route::get("/about", [PagesController::class, "about"]);

//? Routes Posts
Route::get("/posts", [PostController::class, "index"]);
Route::get("posts/{post:slug}", [PostController::class, "post"]);
Route::get("categories", [PostController::class, "categories"]);

//? Routes Login
Route::get("/login", [LoginController::class, "index"])->name("login")->middleware("guest");
Route::post("/login", [LoginController::class, "authenticate"]);

//? Routes Logout
Route::post("/logout", [LoginController::class, "logout"]);

//? Routes Register
Route::get("/register", [RegisterController::class, "index"])->middleware("guest");
Route::post("/register", [RegisterController::class, "store"]);

//? Routes Dashboard
Route::get("/dashboard", function(){
    return view("dashboard.index", [
        "title" => "Dashboard",
        "active" => "posts"
    ]);
})->middleware("auth");

Route::get("dashboard/posts/checkSlug", [DashboardPostController::class, "checkSlug"])->middleware("auth");
Route::resource("/dashboard/posts", DashboardPostController::class)->scoped(["post" => "slug"])->middleware("auth");

//? Route Admin
Route::resource("/dashboard/categories", AdminCategoryController::class)->except("show")->middleware("IsAdmin");