<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Section;

use App\Models\Section;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $section;

    public $editModal = false;

    protected $listeners = [
        'editModal',
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

    public function editModal(Section $section)
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->section = $section;

        $this->editModal = true;
    }

     public function update()
     {
         try {
             $this->validate();

             if ($this->image) {
                 $imageName = Str::slug($this->section->title).'-'.date('Y-m-d H:i:s').'.'.$this->image->extension();
                 $this->image->storeAs('sections', $imageName);
                 $this->section->image = $imageName;
             }

             $this->section->save();

             $this->alert('success', __('Section updated successfully!'));

             $this->editModal = false;
         } catch (Throwable $th) {
             $this->alert('warning', __('Section was not updated!'));
         }
     }
}
