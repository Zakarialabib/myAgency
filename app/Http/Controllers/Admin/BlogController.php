<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    // Blog Index
    public function index(){
             
        return view('admin.blog.index');
    }

    // Add Blog 
    public function create(){
        return view('admin.blog.create');
    }
   
    // Blog  Edit
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    // Blog Show
    public function show(Blog $blog)
    {
        return view('admin.blog.show', compact('blog'));
    }

}
