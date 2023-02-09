<?php

namespace App\Http\Controllers\Admin;


use App\Helpers\Helper;
use App\Models\Language;
use App\Models\Portfolio;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    // Index Section 
    public function index()
    {
        return view('admin.section.index');
    }

    // Add Section
    public function create()
    {
        return view('admin.section.create');
    }

    // Section Edit
    public function edit(Section $section)
    {
        return view('admin.section.edit', compact('section'));
    }

}
