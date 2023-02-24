<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Service;

use App\Models\Service;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Str;

class Edit extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public Service $service;

    public $image;
    public $icon;

    protected $listeners = [
        'submit',
    ];

    protected $rules = [
        'service.language_id' => 'required',
        'service.status' => 'required',
        'service.icon' => 'nullable',
        'service.title' => 'required|max:191',
        'service.content' => 'required',
    ];

    public function mount(Service $service)
    {
        $this->service = $service;
    }

    public function render()
    {
        return view('livewire.admin.service.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->service->slug = Str::slug($this->service->title);

        if ($this->image) {
            $imageName = Str::slug($this->service->title).'.'.$this->image->extension();
            $this->image->storeAs('services', $imageName);
            $this->service->image = $imageName;
        }

        $this->service->save();

        $this->alert('success', __('Service updated successfully!'));

        return redirect()->route('admin.services.index');
    }
}
