<?php

namespace App\Http\Livewire\Admin\Blog;

use Livewire\WithFileUploads;
use App\Models\Bcategory;
use App\Models\Language;
use Livewire\Component;
use App\Models\Blog;
use Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public Blog $blog; 
   
    public $image;
    
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
        $this->blog->slug = Str::slug($this->blog->title);
        // Store image
        if($this->image){
            $imageName = Str::slug($this->blog->title).'.'.$this->image->extension();
            $this->image->storeAs('blogs',$imageName);
            $this->blog->image = $imageName;
        }

        $this->blog->save();
            
        $this->alert('success', __('Blog created successfully!') );
        
        return redirect()->route('admin.blogs.index');

    }

    public function render()
    {
        return view('livewire.admin.blog.create');
    }


}
