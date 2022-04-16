<?php

namespace App\Http\Controllers\Admin;


use App\Helpers\Helper;
use App\Models\Language;
use App\Models\Portfolio;
use App\Models\Sectiontitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectiontitleController extends Controller
{
    // Index Sectiontitle 
    public function index()
    {
        return view('admin.sectiontitle.index');
    }

    // Add Sectiontitle
    public function create()
    {
        return view('admin.sectiontitle.create');
    }

    // Sectiontitle Edit
    public function edit(Sectiontitle $sectiontitle)
    {
        return view('admin.sectiontitle.edit', compact('sectiontitle'));
    }

}
