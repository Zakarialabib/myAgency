<?php

namespace App\Http\Livewire\Admin\Bcategory;

use Livewire\Component;
use App\Models\Language;
use App\Models\Bcategory;
use App\Helpers\Helper;

class Create extends Component
{
    public Bcategory $bcategory;
    
    public $name ,$language_id, $serial_number, $status, $slug, $blogs;

    protected $listeners = [
        'submit',
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
        
        $this->slug = Helper::make_slug($this->name);
        $this->blogs = Bcategory::select('slug')->get();

        $this->bcategory->save();


        // $this->alert('success', __('Bcategory created successfully!') );

        return redirect()->route('admin.bcategories.index');
    }

    protected function rules(): array
    {
        return [
            'name' => [
                'required',
                'unique:bcategories,name',
                'max:150',
            ],
            'status' => 'required',
        ];
    }
}
