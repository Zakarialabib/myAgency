<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.role.index');
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'));
    }

    public function show(Role $role)
    {
        $role->load('permissions');

        return view('admin.role.show', compact('role'));
    }
}
