<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function create()
    {

        return view('admin.user.create');
    }

    public function edit(User $user)
    {

        return view('admin.user.edit', compact('user'));
    }

    public function show(User $user)
    {

        $user->load('roles');

        return view('admin.user.show', compact('user'));
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);

        return view('admin.user.profile', compact('user'));
    }

}
