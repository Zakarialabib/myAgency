<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Blog;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Language;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;

class Edit extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $editModal = false;
    public $blog;

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
        'description'           => 'required|min:3',
        'meta_title'       => 'nullable|max:100',
        'meta_description' => 'nullable|max:200',
    ];

    #[On('editModal')]
    public function editModal($id)
    {
        // abort_if(Gate::denies('blog_edit'), 403);

        $this->resetErrorBag();

        $this->resetValidation();

        $this->blog = Blog::where('id', $id)->firstOrFail();
        $this->title = $this->blog->title;
        $this->category_id = $this->blog->category_id;
        $this->slug = $this->blog->slug;
        $this->meta_title = $this->blog->meta_title;
        $this->meta_description = $this->blog->meta_description;
        $this->image = $this->blog->image;
        $this->description = $this->blog->description;

        $this->editModal = true;
    }

    public function render()
    {
        // abort_if(Gate::denies('blog_create'), 403);

        return view('livewire.admin.blog.edit');
    }
   

    public function update()
    {
        $this->validate();

        if ($this->image) {
            $imageName = Str::slug($this->title).'.'.$this->image->extension();
            $this->image->storeAs('blogs', $imageName);
            $this->blog->image = $imageName;
        }

        $this->blog->description = $this->description;
        $this->blog->language_id = 1;

        $this->blog->save();

        $this->alert('success', __('Blog updated successfully.'));

        $this->dispatch('refreshIndex');

        $this->editModal = false;
    }

 

    public function getBlogCategoriesProperty()
    {
        return BlogCategory::pluck('title', 'id')->toArray();
    }
}