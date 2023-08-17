<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Category;

use App\Livewire\Utils\WithSorting;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Attributes\Computed;

#[Layout('components.layouts.dashboard')]
class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use LivewireAlert;
    use WithFileUploads;

    public $category;

    public $name;

    public $listeners = [
        'refreshIndex' => '$refresh',
    ];

    public int $perPage;

    public array $orderable;

    #[Url(keep: true)]
    public $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search',
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    #[Computed]
    public function selectedCount()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy = 'id';
        $this->sortDirection = 'desc';
        $this->perPage = 100;
        $this->paginationOptions = [25, 50, 100];
        $this->orderable = (new Category())->orderable;
    }

    public function render()
    {
        $query = Category::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $categories = $query->paginate($this->perPage);

        return view('livewire.admin.category.index', compact('categories'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('category_delete'), 403);

        Category::whereIn('id', $this->selected)->delete();

        $this->alert('success', __('Category deleted successfully.'));

        $this->resetSelected();
    }

    public function delete(Category $category)
    {
        abort_if(Gate::denies('category_delete'), 403);

        if ($category->products()->isNotEmpty()) {
            $this->alert('error', __('Can\'t delete beacuse there are products associated with this category !'));
        }
        $category->delete();

        $this->alert('success', __('Category deleted successfully.'));
    }
}
