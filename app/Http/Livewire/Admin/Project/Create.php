<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Project;

use App\Models\Project;
use App\Models\Service;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Str;

class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public Project $project;

    public $images;

    public $featured_image;

    public array $listsForFields = [];

    protected $listeners = [
        'submit',
    ];

    protected $rules = [
        'project.title' => 'required|unique:projects,title|max:191',
        'project.status' => 'required',
        'project.content' => 'required',
        'project.client_name' => 'required',
        'project.link' => 'required',
        'project.service_id' => 'required',
        'project.meta_keywords' => 'required',
        'project.meta_description' => 'required',
        'project.language_id' => 'required',
    ];

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->initListsForFields();
    }

    public function submit()
    {
        $this->project->slug = Str::slug($this->project->title);

        if ($this->featured_image) {
            $imageName = Str::slug($this->project->title).'.'.$this->featured_image->extension();
            $this->featured_image->storeAs('projects', $imageName);
            $this->project->featured_image = $imageName;
        }

        // Multiple images within an array

        foreach ($this->images as $key => $image) {
            $this->images[$key] = $image->store('project', 'public');
        }

        $this->images = json_encode($this->images);

        $this->project->gallery = $this->images;

        $this->project->save();

        $this->alert('success', __('Service created successfully!'));

        return redirect()->route('admin.projects.index');
    }

    public function render()
    {
        return view('livewire.admin.project.create');
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['services'] = Service::pluck('title', 'id')->toArray();
    }
}
