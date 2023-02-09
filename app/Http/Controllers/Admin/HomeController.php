<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gate;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function contacts()
    {
        return view('admin.contact');
    }

}