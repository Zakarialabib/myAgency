<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Blog;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;

class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $createModal = false;

    public Blog $blog;
    public $title;
    public $category_id;
    public $slug;
    public $meta_title;
    public $meta_description;
    public $image;
    public $description;

    protected $rules = [
        'title'            => 'required|min:3|max:255',
        'category_id'      => 'required|integer',
        'slug'             => 'required|string',
        'description'      => 'required|min:3',
        'meta_title'       => 'nullable|max:100',
        'meta_description' => 'nullable|max:200',
    ];

    public function render()
    {
        // abort_if(Gate::denies('blog_create'), 403);

        return view('livewire.admin.blog.create');
    }

    #[On('createModal')]
    public function createModal()
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->description = '';

        $this->slug = Str::slug($this->title);

        $this->meta_title = $this->title;

        $this->meta_description = $this->description;

        $this->createModal = true;
    }

    public function create()
    {
        $this->validate();

        if ($this->image) {
            $imageName = Str::slug($this->title).'.'.$this->image->extension();
            $this->image->storeAs('blogs', $imageName);
            $this->blog->image = $imageName;
        }

        $this->blog->language_id = 1;

        $this->blog->description = $this->description;

        $this->blog->save();

        $this->dispatch('refreshIndex');

        $this->alert('success', __('Blog created successfully.'));

        $this->createModal = false;
    }

    #[Computed]
    public function blogCategories()
    {
        return BlogCategory::select('title', 'id')->get();
    }
}
