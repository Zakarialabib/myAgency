<?php

declare(strict_types=1);

namespace App\Livewire\Admin\BlogCategory;

use App\Models\BlogCategory;
use App\Models\Language;
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

    public $blogcategory;

    protected $rules = [
        'blogcategory.title'            => 'required|string|max:255',
        'blogcategory.description'      => 'nullable',
        'blogcategory.meta_title'       => 'nullable|max:100',
        'blogcategory.meta_description' => 'nullable|max:200',
        'blogcategory.language_id'      => 'required|integer',
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

        $this->blogcategory = new BlogCategory();

        $this->blogcategory->meta_title = $this->blogcategory->title;
        $this->blogcategory->meta_description = $this->blogcategory->description;

        $this->createModal = true;
    }

    public function create()
    {
        $this->validate();

        $this->blogcategory->save();

        $this->alert('success', __('BlogCategory created successfully.'));

        $this->createModal = false;

        $this->dispatch('refreshIndex');
    }

    public function getLanguagesProperty()
    {
        return Language::pluck('name', 'id')->toArray();
    }
}
