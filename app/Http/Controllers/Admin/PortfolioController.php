<?php

namespace App\Http\Controllers\Admin;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    // Index Portfolio 
    public function index()
    {
        return view('admin.portfolio.index');
    }

    // Add Portfolio 
    public function create(Portfolio $portfolio)
    {
        return view('admin.portfolio.create', compact('portfolio'));
    }
    
    // Portfolio  Edit
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }
    
    // Portfolio  Show
    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolio.show', compact('portfolio'));
    }
}
