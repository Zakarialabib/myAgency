<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Section;

use Livewire\Component;
use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Collection;
use App\Models\Section;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Language;
use Livewire\Attributes\On;

class Edit extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $editModal = false;

    public $section;

    public $page_id;
    public $title;
    public $subtitle;
    public $image;

    public $label;
    public $link;

    public $bg_color;

    public $text_color;

    public $embeded_video;
    public $description;

    protected $rules = [
        'page_id'     => ['nullable'],
        'title'       => ['nullable', 'string', 'max:255'],
        'subtitle'    => ['nullable', 'string', 'max:255'],
        'description'         => ['nullable'],
    ];

    public function updatedDescription($value)
    {
        $this->description = $value;
    }

    #[On('editModal')]
    public function editModal($id)
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->section = Section::where('id', $id)->firstOrFail();

        $this->page_id = $this->section->page_id;
        $this->title = $this->section->title;
        $this->subtitle = $this->section->subtitle;

        $this->label = $this->section->label;
        $this->link = $this->section->link;

        $this->bg_color = $this->section->bg_color;

        $this->text_color = $this->section->text_color;

        $this->embeded_video = $this->section->embeded_video;
        $this->image = $this->section->image;

        $this->description = $this->section->description;

        $this->editModal = true;
    }

    public function update()
    {
        // try {
        $this->validate();

        if ($this->image) {
            $imageName = Str::slug($this->section->title) . '-' . Str::random(3) . '.' . $this->image->extension();
            $this->image->storeAs('sections', $imageName);
            $this->section->image = $imageName;
        }

        $this->section->language_id = 1;
        $this->section->description = $this->description;

        $this->section->save();

        $this->alert('success', __('Section updated successfully!'));

        $this->dispatch('refreshIndex');

        $this->editModal = false;
        // } catch (Throwable $th) {
        //     $this->alert('warning', __('Section was not updated!'));
        // }
    }


    public function render(): View
    {
        return view('livewire.admin.section.edit');
    }
}
