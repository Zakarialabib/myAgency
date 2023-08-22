<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Project;

use App\Models\Project;
use App\Models\Service;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use LiveWire\Attributes\On;
use LiveWire\Attributes\Rule;
use Livewire\Attributes\Computed;

class Edit extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $project;

    public $gallery = [];

    public $image;

    #[Rule('required|max:191')]
    public $title;
    #[Rule('required|max:191')]
    public $client_name;

    public $link;
    public $service_id;

    #[Rule('nullable')]
    public $meta_title;
    #[Rule('nullable')]
    public $meta_description;
    #[Rule('min:3')]
    public $content;
    public $editModal = false;

    #[On('editModal')]
    public function editModal($id)
    {
        // abort_if(Gate::denies('project_update'), 403);

        $this->resetErrorBag();

        $this->resetValidation();

        $this->project = Project::where('id', $id)->first();
        $this->title = $this->project->title;
        $this->client_name = $this->project->client_name;
        $this->link = $this->project->link;
        $this->service_id = $this->project->service_id;
        $this->meta_title = $this->project->meta_title;
        $this->meta_description = $this->project->meta_description;
        $this->content = $this->project->content;

        $this->editModal = true;
    }

    public function submit()
    {
        $validated = $this->validate();

        if ( ! $this->image) {
            $this->image = null;
        } elseif (is_object($this->image) && method_exists($this->image, 'extension')) {
            $imageName = Str::slug($this->project->title).'.'.$this->image->extension();
            $this->image->storeAs('projects', $imageName);
            $this->project->image = $imageName;
        }

        if (empty($this->gallery)) {
            foreach ($this->gallery as $key => $image) {
                $this->gallery[$key] = $image->storeAs('projects', Str::slug($this->project->title).'-'.$key.'.'.$image->extension());
            }
        }

        $this->gallery = json_encode($this->gallery);

        $this->project->language_id = 1;

        $this->project->update($validated);

        $this->dispatch('refreshIndex');

        $this->alert('success', __('Project updated successfully!'));

        $this->editModal = false;
    }

    public function render()
    {
        return view('livewire.admin.project.edit');
    }

    #[Computed]
    public function services()
    {
        return Service::select('title', 'id')->get();
    }
}
