<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TeamController extends Controller
{

    // Index Team 
    public function index()
    {
        return view('admin.team.index');
    }

    // Add Team
    public function create()
    {
        return view('admin.team.create');
    }

    // Team Edit
    public function edit(Team $team)
    {
        return view('admin.team.edit', compact('team'));
    }
    
    // Team  Show
    public function show(Team $team)
    {
        return view('admin.team.show', compact('team'));
    }
   
}