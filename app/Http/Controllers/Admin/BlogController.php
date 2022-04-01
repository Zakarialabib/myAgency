<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Blog;
use App\Models\Language;
use App\Models\Bcategory;
use App\Models\Sectiontitle;
use App\Helpers\Helper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
   
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
}
