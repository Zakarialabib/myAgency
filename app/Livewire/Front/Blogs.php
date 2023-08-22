<?php

declare(strict_types=1);

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\Blog;
use App\Models\BlogCategory;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class Blogs extends Component
{
    use WithPagination;

    use WithPagination;

    public $category;

    protected $listeners = ['categorySelected'];

    public function categorySelected($category)
    {
        $this->category = $category;
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
        $blogs = Blog::with('category')
            ->when('category', function ($query) {
                $query->where('category_id', $this->category);
            })->paginate(6);

        return view('livewire.front.blogs', compact('blogs'));
    }
}
