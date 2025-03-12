<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        // Fetch posts with pagination
        $posts = Post::orderBy("created_at", "desc")->paginate(10);

        // Return the view with the posts
        return view("index", ['posts' => $posts]);
    }
}
