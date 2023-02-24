<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Bcategory;
use App\Models\Blog;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Str;

class Edit extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public Blog $blog;

    public $image;

    public array $listsForFields = [];

    protected $listeners = [
        'submit',
    ];

    protected $rules = [
        'blog.title' => 'required|max:191',
        'blog.status' => 'required',
        'blog.content' => 'required',
        'blog.bcategory_id' => 'required',
        'blog.meta_keywords' => 'required',
        'blog.meta_description' => 'required',
        'blog.language_id' => 'required',
    ];

    public function mount(Blog $blog)
    {
        $this->blog = $blog;
        $this->initListsForFields();
    }

    // Store Blog
    public function submit()
    {
        $this->validate();
        $this->blog->slug = Str::slug($this->blog->title);

        if ($this->image) {
            $imageName = Str::slug($this->blog->title).'.'.$this->image->extension();
            $this->image->storeAs('blogs', $imageName);
            $this->blog->image = $imageName;
        }

        $this->blog->save();

        $this->alert('success', __('Blog Updated successfully!'));

        return redirect()->route('admin.blogs.index');
    }

    public function render()
    {
        return view('livewire.admin.blog.edit');
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['bcategories'] = Bcategory::pluck('name', 'id')->toArray();
    }
}
