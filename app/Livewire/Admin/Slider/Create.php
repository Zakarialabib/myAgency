<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Throwable;
use Livewire\Attributes\On;

class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $createModal = false;

    public Slider $slider;
    public $title;
    public $subtitle;
    public $link;
    public $bg_color;
    public $embeded_video;
    public $image;
    public $description;

    public array $rules = [
        'title'         => ['required', 'string', 'max:255'],
        'subtitle'      => ['nullable', 'string'],
        'description'   => ['nullable'],
        'link'          => ['nullable', 'string'],
        'bg_color'      => ['nullable'],
        'embeded_video' => ['nullable'],
        'image'         => ['required'],
    ];

    public function render()
    {
        abort_if(Gate::denies('slider_create'), 403);

        return view('livewire.admin.slider.create');
    }

    #[On('createModal')]
    public function createModal()
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->createModal = true;
    }

    public function create()
    {
        try {
            $this->validate();

            if ( ! $this->image) {
                $this->image = null;
            } elseif (is_object($this->image) && method_exists($this->image, 'extension')) {
                $imageName = Str::slug($this->title).'-'.Str::random(5).'.'.$this->image->extension();

                // $this->slider->addMediaFromDisk($this->image->getRealPath())
                //     ->usingFileName($imageName)
                //     ->toMediaCollection('local_files');

                $this->slider->image = $imageName;
            }

            $this->slider->language_id = 1;
            $this->slider->description = $this->description;

            $this->slider->save();

            $this->alert('success', __('Slider created successfully.'));

            $this->dispatch('refreshIndex');

            $this->createModal = false;
        } catch (Throwable $th) {
            $this->alert('warning', __('An error happend Slider was not created.'));
        }
    }
}
