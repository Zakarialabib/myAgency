<?php

namespace App\Http\Livewire\Admin\Blog;

use Livewire\Component;
use App\Models\Language;
use App\Models\Blog;
use App\Models\Bcategory;
use Str;

class Create extends Component
{
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

    // Store Blog 
    public function submit(){


        $this->validate([
            'main_image' => 'required|mimes:jpeg,jpg,png',
            'title' => [
                'required',
                'unique:blogs,title',
                'max:255',
            ],
            'status' => 'required',
            'content' => 'required',
            'bcategory_id' => 'required',
            'language_id' => 'required',
        ]);


        if($request->hasFile('main_image')){

            $file = $request->file('main_image');
            $extension = $file->getClientOriginalExtension();
            $main_image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $main_image);

            $blog->main_image = $main_image;
        }

        $this->blog->slug = Str::slug($this->blog->title);

        $this->blog->save();

        
        return redirect()->back();

    }

    public function render()
    {

        $blogs = Blog::select('slug')->get();
        return view('livewire.admin.blog.create',compact('blogs'));
    }
}
