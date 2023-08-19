<?php

declare(strict_types=1);

namespace App\Livewire\Admin\BlogCategory;

use App\Models\BlogCategory;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;

class Edit extends Component
{
    use LivewireAlert;

    public $blogcategory;

    public $title;
    public $description;
    public $meta_title;
    public $meta_description;
    public $language_id;
    public $editModal = false;

    protected $rules = [
        'title'            => 'required|string|max:255',
        'description'      => 'nullable',
        'meta_title'       => 'nullable|max:100',
        'meta_description' => 'nullable|max:200',
    ];

    #[On('editModal')]
    public function editModal($id)
    {
        // abort_if(Gate::denies('blogcategory_edit'), 403);

        $this->resetErrorBag();

        $this->resetValidation();

        $this->blogcategory = BlogCategory::where('id', $id)->firstOrFail();

        $this->title = $this->blogcategory->title;
        $this->description = $this->blogcategory->description;
        $this->meta_title = $this->blogcategory->meta_title;
        $this->meta_description = $this->blogcategory->meta_description;
        $this->editModal = true;
    }

    public function update()
    {
        $validated = $this->validate();

        $this->blogcategory->update($validated);

        $this->alert('success', __('BlogCategory updated successfully'));

        $this->dispatch('refreshIndex');

        $this->editModal = false;
    }

    public function render(): View
    {
        return view('livewire.admin.blog-category.edit');
    }
}
