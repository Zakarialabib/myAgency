<?php

namespace App\Http\Livewire\Admin\Section;

use Livewire\WithFileUploads;
use App\Models\Section;
use App\Models\Language;
use Livewire\Component;
use Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    
    public Section $section;
    
    public $image;

    protected $listeners = [
        'submit',
    ];
    
    protected $rules = [    
        'section.language_id' => 'required',
        'section.page_id' => 'required',
        'section.title' => 'nullable',
        'section.featured_title' => 'nullable',
        'section.subtitle' => 'nullable',
        'section.text' => 'nullable',
        'section.main_color' => 'nullable',
        'section.button' => 'nullable',
        'section.position' => 'nullable',
        'section.label' => 'nullable',
        'section.link' => 'nullable',
        'section.description' => 'nullable',
        'section.embeded_video' => 'nullable',
    ]; 


    public function mount(Section $section)
    {
        $this->section = $section;
    }

    public function render()
    {
        return view('livewire.admin.section.edit');
    }

    public function submit()
    {
        $this->validate();
        
        if($this->image){
            $imageName = Str::slug($this->section->title).'.'.$this->image->extension();
            $this->image->storeAs('sections',$imageName);
            $this->section->image = $imageName;
        }

        $this->section->save();

        $this->alert('success', __('Section updated successfully!') );

        return redirect()->route('admin.sections.index');
    }
  
}
