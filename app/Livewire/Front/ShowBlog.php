<?php

declare(strict_types=1);

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\Blog;
use App\Models\BlogCategory;
use Livewire\Attributes\Computed;

class ShowBlog extends Component
{
    public $blog;

    #[Computed]
    public function categories()
    {
        return BlogCategory::select('id', 'title')->get();
    }

    public function mount($slug)
    {
        $this->blog = Blog::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.front.show-blog')->extends('layouts.guest');
    }
}
