<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BcategoryController extends Controller
{
    public function index()
    {
        return view('admin.blog.blog-category.index');
    }

    // Add Blog Category
    public function create()
    {
        return view('admin.blog.blog-category.create');
    }

    public function show(Bcategory $bcategory)
    {
        return view('admin.blog.blog-category.show', compact('bcategory'));
    }

    // Blog Category Edit
    public function edit(Bcategory $bcategory)
    {
        return view('admin.blog.blog-category.edit', compact('bcategory'));
    }

}
