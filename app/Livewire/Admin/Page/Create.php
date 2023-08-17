<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Page;

use App\Models\Page;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $ِcreateModal;

    public Page $page;

    #[Rule('required|min:3|max:255')] 
    public $title;
    #[Rule('required|min:3|max:255')] 
    public $slug;
    public $description;
    #[Rule('nullable')] 
    public $meta_title;
    #[Rule('nullable')] 
    public $meta_description;
    public $image;


    public function updatedDescription($value)
    {
        $this->description = $value;
    }

    public function render()
    {
        // abort_if(Gate::denies('page_create'), 403);

        return view('livewire.admin.page.create');
    }

    #[On('createModal')]
    public function ِcreateModal()
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->ِcreateModal = true;
    }

    public function create()
    {
         $this->validate();

        $this->slug = Str::slug($this->name);

        if ($this->image) {
            $imageName = Str::slug($this->name) . '-' . date('Y-m-d H:i:s') . '.' . $this->image->extension();
            $this->image->storeAs('pages', $imageName);
            $this->page->image = $imageName;
        }

        Post::create([
            'title' => $this->title,
            'description' => $this->description,
            'slug' => $this->slug,
            'image' => $this->image,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description
        ]);
        
        $this->dispatch('refreshIndex');

        $this->alert('success', __('Page created successfully.'));

        $this->ِcreateModal = false;
    }
}
