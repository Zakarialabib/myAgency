<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Section;

use App\Models\Language;
use App\Models\Section;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public Section $section;

    public $image;
    public $page_id;
    public $title;
    public $featured_title;
    public $subtitle;
    public $description;

    public $label;
    public $link;
    public $bg_color;
    public $text_color;
    public $embeded_video;

    public $createModal = false;

    protected $rules = [
        'page_id'        => 'required',
        'title'          => 'nullable',
        'featured_title' => 'nullable',
        'subtitle'       => 'nullable',
        'label' => 'nullable',
        'link' => 'nullable',
        'bg_color' => 'nullable',
        'text_color' => 'nullable',
        'embeded_video' => 'nullable',
        'description' => 'nullable',
    ];

    public function updatedDescription($value)
    {
        $this->description = $value;
    }

    #[On('createModal')]
    public function createModal()
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->createModal = true;
    }

    public function render()
    {
        return view('livewire.admin.section.create');
    }

    public function save()
    {
        $this->validate();

        if ($this->image) {
            $imageName = Str::slug($this->section->title).'-'.date('Y-m-d H:i:s').'.'.$this->image->extension();
            $this->image->storeAs('sections', $imageName);
            $this->section->image = $imageName;
        }

        $this->section->language_id = 1;
        $this->section->description = $this->description;
        $this->section->save();

        $this->dispatch('refreshIndex');

        $this->alert('success', __('Section created successfully!'));

        $this->createModal = false;
    }
}
