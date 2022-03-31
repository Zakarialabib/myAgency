<?php

namespace App\Http\Livewire\Admin\Blog;

use Livewire\WithFileUploads;
use App\Models\Bcategory;
use App\Models\Language;
use Livewire\Component;
use App\Models\Blog;
use Str;

class Create extends Component
{
    use WithFileUploads;

    public Blog $blog;
    
    public array $listsForFields = [];
    
    protected $listeners = [
        'submit',
    ];

    public function mount(Blog $blog)
    {
        $this->blog = $blog;
        $this->initListsForFields();
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['bcategories'] = Bcategory::pluck('name', 'id')->toArray();
    }

    protected $rules = [    

        'blog.image' => 'nullable',
        'blog.title' => 'required|unique:blogs,title|max:191',
        'blog.status' => 'required',
        'blog.content' => 'required',
        'blog.bcategory_id' => 'required',
        'blog.meta_keywords' => 'required',
        'blog.meta_description' => 'required',
        'blog.language_id' => 'required',
    ]; 

    // Store Blog 
    public function submit()
    {
        $this->validate();

        if(!empty($this->image)){

            $file = $this->image->store("/");

            $this->blog->image = $file;
        }

        $this->blog->slug = Str::slug($this->blog->title);

        $this->blog->save();

        // $this->alert('success', __('Blog created successfully!') );
        
        return redirect()->route('admin.blogs.index');

    }

    public function render()
    {
        return view('livewire.admin.blog.create');
    }


}
