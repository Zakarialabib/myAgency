<?php

declare(strict_types=1);

namespace App\Livewire\Admin\BlogCategory;

use App\Models\BlogCategory;
use Illuminate\Support\Facades\Gate;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $createModal = false;

    public BlogCategory $blogcategory;
    public $title;
    public $description;
    public $meta_title;
    public $meta_description;
    public $language_id;

    protected $rules = [
        'title'            => 'required|string|max:255',
        'description'      => 'nullable',
        'meta_title'       => 'nullable|max:100',
        'meta_description' => 'nullable|max:200',
    ];

    public function render()
    {
        abort_if(Gate::denies('blogcategory_create'), 403);

        return view('livewire.admin.blog-category.create');
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
        $validated = $this->validate();

        $this->language_id = 1;
        $this->meta_title = $this->title;
        $this->meta_description = $this->description;

        BlogCategory::create($validated);

        $this->alert('success', __('BlogCategory created successfully.'));

        $this->createModal = false;

        $this->dispatch('refreshIndex');
    }
}
