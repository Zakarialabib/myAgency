<?php

namespace App\Http\Livewire\Admin\Sectiontitle;

use Livewire\WithFileUploads;
use App\Models\Sectiontitle;
use App\Models\Language;
use Livewire\Component;
use Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    
    public Sectiontitle $sectiontitle;
    
    public $image;

    protected $listeners = [
        'submit',
    ];
    
    protected $rules = [    
        'sectiontitle.language_id' => 'required',
        'sectiontitle.page' => 'required',
        'sectiontitle.title' => 'nullable',
        'sectiontitle.subtitle' => 'nullable',
        'sectiontitle.text' => 'nullable',
        'sectiontitle.button' => 'nullable',
        'sectiontitle.link' => 'nullable',
        'sectiontitle.content' => 'nullable',
        'sectiontitle.video' => 'nullable',
    ]; 

    public function mount(Sectiontitle $sectiontitle)
    {
        $this->sectiontitle = $sectiontitle;
    }

    public function render()
    {
        return view('livewire.admin.sectiontitle.create');
    }

    public function submit()
    {
        $this->validate();
        
        if($this->image){
            $imageName = Str::slug($this->sectiontitle->title).'.'.$this->image->extension();
            $this->image->storeAs('sectiontitles',$imageName);
            $this->sectiontitle->image = $imageName;
        }

        $this->sectiontitle->save();

        $this->alert('success', __('Sectiontitle created successfully!') );

        return redirect()->route('admin.sectiontitles.index');
    }
  
}
