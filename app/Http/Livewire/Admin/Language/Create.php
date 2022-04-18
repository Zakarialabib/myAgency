<?php

namespace App\Http\Livewire\Admin\Language;

use Livewire\Component;
use DateTime, File, App;
use Illuminate\Support\Facades\Storage;
use App\Models\Language;
use App\Http\Livewire\Modal;

class Create extends Modal
{
    public $languages = [];
    public $name;
    public $code;
    public $show;

    private function resetInputFields()
    {
        $this->reset(['name', 'code']);
    }

    protected $rules = [    
        'name' => 'required|max:191',
        'code' => 'required',
    ]; 

    public function mount()
    {

        $this->languages = Storage::disk('public')->get('languages.json');

        $this->emitTo('create', 'show');

    }
    /**
     * -------------------------------------------------------------------------------
     *  Add New Language
     * -------------------------------------------------------------------------------
    **/

    public function create()
    {
 
        try {

            $trans             = new Language;
            $trans->name       = $this->name;
            $trans->code       = $this->code;
            $trans->created_at = new DateTime();
            $trans->save();

            File::copy( App::langPath() . ('/default.json'), App::langPath() . ('/' . $this->code . '.json') );
			// $this->alert('success', __('Data created successfully!') );

            $this->resetInputFields();
            // $this->emit('sendUpdateLanguageStatus');

        } catch (\Exception $e) {
            
            // $this->alert('error', __('Unable to create new language!') );
        
        }

        $this->show = false;

    }
    public function render()
    {
        return view('livewire.admin.language.create');
    }
}
