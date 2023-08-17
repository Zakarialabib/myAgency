<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Project;

use App\Models\Project;
use App\Models\Service;
use App\Models\Language;
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

    public Project $project;

    public $image;

    public $gallery;

    #[Rule('required|unique:projects,title|max:191')]
    public $title;
    #[Rule('required|max:191')]
    public $client_name;
    public $link;
    public $service_id;
    public $meta_title;
    public $meta_description;
    public $content;
    public $createModal = false;

  

    #[On('createModal')]
    public function createModal()
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->content = '';

        $this->createModal = true;
    }

    public function submit()
    {
        $this->project->slug = Str::slug($this->project->title);

        if ($this->image) {
            $imageName = Str::slug($this->project->title).'.'.$this->image->extension();
            $this->image->storeAs('projects', $imageName);
            $this->project->image = $imageName;
        }

        // Multiple images within an array

        foreach ($this->gallery as $key => $image) {
            $this->gallery[$key] = $image->store('project', 'public');
        }

        $this->gallery = json_encode($this->gallery);

        $this->project->save();

        $this->alert('success', __('Project created successfully!'));

        $this->dispatch('refreshIndex');

        $this->createModal = false;
    }

    public function render()
    {
        return view('livewire.admin.project.create');
    }

    public function getServicesProperty()
    {
        return Service::select('title', 'id')->get();
    }
}
