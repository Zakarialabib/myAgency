<?php

declare(strict_types=1);

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\Blog;
use App\Models\BlogCategory;
use Livewire\Attributes\Computed;

class BlogShow extends Component
{
    public $blog;

    public function mount($slug)
    {
        $this->blog = Blog::where('slug', $slug)->firstOrFail();
    }

    #[Computed]
    public function featuredBlogs()
    {
        return Blog::active()->where('featured', true)->get();
    }

    #[Computed]
    public function categories()
    {
        return BlogCategory::select('id', 'title')->get();
    }

    public function render()
    {
        return view('livewire.front.blog-show');
    }
}
