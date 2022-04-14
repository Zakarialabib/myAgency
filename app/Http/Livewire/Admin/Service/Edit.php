<?php

namespace App\Http\Livewire\Admin\Service;

use Livewire\WithFileUploads;
use App\Models\Service;
use App\Models\Language;
use Livewire\Component;
use Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    
    public Service $service;
    
    public $image, $icon;

    protected $listeners = [
        'submit',
    ];
    
    protected $rules = [    
        'service.language_id' => 'required',
        'service.status' => 'required',
        'service.icon' => 'nullable',
        'service.title' => 'required|max:191',
        'service.content' => 'required',
    ]; 

    public function mount(Service $service)
    {
        $this->service = $service;
    }

    public function render()
    {
        return view('livewire.admin.service.edit');
    }

    public function submit()
    {
        $this->validate();
        
        $this->service->slug = Str::slug($this->service->title);
        
        if($this->image){
            $imageName = Str::slug($this->service->title).'.'.$this->image->extension();
            $this->image->storeAs('services',$imageName);
            $this->service->image = $imageName;
        }

        $this->service->save();

        $this->alert('success', __('Service updated successfully!') );

        return redirect()->route('admin.services.index');
    }
  
}
