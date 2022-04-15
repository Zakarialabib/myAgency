<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    // Index About 
    public function index(){
        return view('admin.about.index');
    }

    // Add About
    public function create(){
        return view('admin.about.create');
    }

    // About Edit
    public function edit(About $about){

        return view('admin.about.edit', compact('about'));

    }

    public function show(About $about)
    {
        return view('admin.about.show', compact('about'));
    }

}
