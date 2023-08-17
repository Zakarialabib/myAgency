<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Page;

use App\Models\Page;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $editModal;

    public $page;

    public $image;
    public $title;
    public $slug;
    public $description;
    public $meta_title;
    public $meta_description;

    public $listeners = ['editModal'];

    public array $rules = [
        'title'            => ['required', 'string', 'max:255'],
        'slug'             => ['required', 'unique:pages', 'max:255'],
        'description'           => ['required'],
        'meta_title'       => ['nullable|max:255'],
        'meta_description' => ['nullable|max:255'],
    ];

    public function updatedDescription($value)
    {
        $this->description = $value;
    }

    public function render()
    {
        // abort_if(Gate::denies('page_edit'), 403);

        return view('livewire.admin.page.edit');
    }

    public function editModal($id)
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->page = Page::where('id', $id)->firstOrFail();

        $this->description = $this->page->description;

        $this->editModal = true;
    }

    public function update()
    {
        $this->validate();

        $this->page->slug = Str::slug($this->page->name);

        if ($this->image) {
            $imageName = Str::slug($this->page->name).'-'.date('Y-m-d H:i:s').'.'.$this->image->extension();
            $this->image->storeAs('pages', $imageName);
            $this->page->image = $imageName;
        }

        $this->page->description = $this->description;

        $this->page->save();

        $this->dispatch('refreshIndex');

        $this->alert('success', __('Page updated successfully.'));

        $this->editModal = false;
    }
}
