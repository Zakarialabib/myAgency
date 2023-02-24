<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Language;

use App;
use App\Models\Language;
use DateTime;
use Exception;
use File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Create extends Component
{
    public $languages = [];
    public $name;
    public $code;
    public $show;

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
     */
    public function create()
    {
        try {
            $trans = new Language();
            $trans->name = $this->name;
            $trans->code = $this->code;
            $trans->created_at = new DateTime();
            $trans->save();

            File::copy(App::langPath().'/default.json', App::langPath().('/'.$this->code.'.json'));
            // $this->alert('success', __('Data created successfully!') );

            $this->resetInputFields();
            // $this->emit('sendUpdateLanguageStatus');
        } catch (Exception $e) {
            $this->alert('error', __('Unable to create new language!') );
        }

        $this->show = false;
    }

    public function render()
    {
        return view('livewire.admin.language.create');
    }

    private function resetInputFields()
    {
        $this->reset(['name', 'code']);
    }
}
