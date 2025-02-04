<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    //Get all the blogs
    public function index()
    {
        $blogs = Blog::all();
        return response()->json(['blogs'=>$blogs], 200);
    }

    //Get a single blog with comment(s) using slug
    public function show(Blog $blog)
    {
        return $blog->load('comments');
    }

    //Get a single blog with comment(s) using ID
    public function single($id)
    {
        $blog = Blog::with('comments')->find($id);

        return response()->json(['blog'=>$blog]);
    }
}
