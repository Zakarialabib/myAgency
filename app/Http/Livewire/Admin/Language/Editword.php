<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Language;

use App\Models\Language;
use Livewire\Component;

class Editword extends Component
{
    public $show;
    public $key;
    public $value;

    protected $rules = [
        'key' => 'required',
        'value' => 'required',
    ];

    public function mount($id)
    {
        $this->la = Language::find($id);

        $this->list_lang = Language::all();
        $this->key = $this->la->key;
        $this->value = $this->la->value;

        if (empty($json)) {
            return back();
        }

        $json = json_decode($json);

        $this->emitTo('editword', 'show');

        return compact('json', 'list_lang', 'la', 'json');
    }

    public function Editwordmodal()
    {
        $this->validate();

        $reqkey = trim($this->key);
        $reqValue = $this->value;
        $lang = Language::find($id);

        $data = file_get_contents(base_path('lang/').$lang->code.'.json');

        $json_arr = json_decode($data, true);

        $json_arr[$reqkey] = $reqValue;

        file_put_contents(base_path('lang/').$lang->code.'.json', json_encode($json_arr));

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.admin.language.editword');
    }
}
