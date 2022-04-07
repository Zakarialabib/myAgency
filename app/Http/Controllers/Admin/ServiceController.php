<?php

namespace App\Http\Controllers\Admin;


use App\Helpers\Helper;
use App\Models\Service;
use App\Models\Language;
use App\Models\Portfolio;
use App\Models\Sectiontitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    // Index Service 
    public function index(){
        return view('admin.service.index');
    }

    // Add Service
    public function create(){
        return view('admin.service.create');
    }

    // Service Edit
    public function edit(Service $service){

        return view('admin.service.edit', compact('service'));

    }

}
