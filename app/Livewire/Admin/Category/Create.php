<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;

class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $createModal;

    public Category $category;

    public $image;

    protected $rules = [
        'category.name'        => ['required', 'max:255'],
        'category.description' => ['required'],
    ];

    public function mount($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.admin.category.create');
    }

    #[Computed]
    public function categories()
    {
        return Category::select('name', 'id')->get();
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
        $this->validate();

        $this->category->slug = Str::slug($this->category->name);

        if ($this->image) {
            $imageName = Str::slug($this->category->name).'-'.Str::random(3).'.'.$this->image->extension();
            $this->category->addMedia($this->image)->toMediaCollection('local_files');
            $this->category->images = $imageName;
        }

        $this->category->save();

        $this->dispatch('refreshIndex');

        $this->alert('success', 'Category created successfully.');

        $this->createModal = false;
    }
}
