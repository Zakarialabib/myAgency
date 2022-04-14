<?php

namespace App\Http\Livewire\Admin\Bcategory;

use Livewire\Component;
use App\Models\Language;
use App\Models\Bcategory;
use Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    use LivewireAlert;
    public Bcategory $bcategory;
    
    public $name ,$language_id, $status, $slug;

    protected $listeners = [
        'submit',
    ];
    
    protected $rules = [    
        'bcategory.name' => 'required|unique:bcategories,name|max:191',
        'bcategory.language_id' => 'required',
        'bcategory.status' => 'required',
        'slug' => 'nullable'
    ]; 

    public function mount(Bcategory $bcategory)
    {
        $this->bcategory = $bcategory;
    }

    public function render()
    {
        return view('livewire.admin.bcategory.create');
    }

    public function submit()
    {
        $this->validate();
        
        $this->bcategory->slug = Str::slug($this->bcategory->name);

        $this->bcategory->save();

        $this->alert('success', __('Bcategory created successfully!') );

        return redirect()->route('admin.bcategories.index');
    }
  
}
