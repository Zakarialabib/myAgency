<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Section;

use App\Models\Section;
use Illuminate\Support\Collection;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Models\Language;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $section;

    public $image;

    public $createSection = false;

    public $listeners = [
        'createSection',
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

    public function createSection()
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->createSection = true;
    }

    public function mount(Section $section)
    {
        $this->section = $section;
    }

    public function render(): View|Factory
    {
        return view('livewire.admin.section.create');
    }

    public function getLanguagesProperty(): Collection
    {
        return Language::select('name', 'id')->get();
    }

    public function save()
    {
        $this->validate();

        if ($this->image) {
            $imageName = Str::slug($this->section->title).'-'.date('Y-m-d H:i:s').'.'.$this->image->extension();
            $this->image->storeAs('sections', $imageName);
            $this->section->image = $imageName;
        }

        $this->section->save();

        $this->emit('refreshIndex');

        $this->alert('success', __('Section created successfully!'));

        $this->createSection = false;
    }
}
