<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Service;

use App\Models\Service;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public Service $service;

    public $image;

    #[Rule('required|unique:services,title|max:191')]
    public $title;
    #[Rule('required|max:90')]
    public $type;
    #[Rule('nullable')]
    public $features;
    #[Rule('nullable')]
    public $options;

    #[Rule('min:3')]
    public $content;
    public $slug;
    public $language_id;

    public $createModal = false;

    #[On('createModal')]
    public function createModal()
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->content = '';

        $this->createModal = true;
    }

    public function render()
    {
        return view('livewire.admin.service.create');
    }

    public function submit()
    {
        $validated = $this->validate();

        $this->slug = Str::slug($this->title);

        if ($this->image) {
            $imageName = Str::slug($this->title).'.'.$this->image->extension();
            $this->image->storeAs('services', $imageName);
            $this->service->image = $imageName;
        }

        $this->language_id = 1;

        Service::create($validated);

        $this->alert('success', __('Service created successfully!'));

        $this->dispatch('refreshIndex');

        $this->reset(['title', 'type', 'features', 'options', 'image', 'content']);

        $this->createModal = false;
    }
}
