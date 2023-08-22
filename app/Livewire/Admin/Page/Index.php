<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Page;

use App\Livewire\Utils\WithSorting;
use App\Models\Page;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.dashboard')]
class Index extends Component
{
    use WithPagination;
    use WithSorting;

    public $listeners = [
        'refreshIndex' => '$refresh',
        'delete',
    ];

    public $deleteModal = false;

    public $page;
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
        $this->perPage = 25;
        $this->paginationOptions = [25, 50, 100];
        $this->orderable = (new Page())->orderable;
    }

    public function render()
    {
        $query = Page::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $pages = $query->paginate($this->perPage);

        return view('livewire.admin.page.index', compact('pages'));
    }

    public function delete()
    {
        // abort_if(Gate::denies('page_delete'), 403);

        Page::findOrFail($this->page)->delete();

        $this->alert('success', __('Page deleted successfully.'));
    }

    public function deleteSelected()
    {
        // abort_if(Gate::denies('page_delete'), 403);

        Page::whereIn('id', $this->selected)->delete();

        $this->resetSelected();

        $this->alert('success', __('Page deleted successfully.'));
    }

    public function confirmed()
    {
        $this->dispatch('delete');
    }

    public function deleteModal($page)
    {
        $this->confirm(__('Are you sure you want to delete this?'), [
            'toast'             => false,
            'position'          => 'center',
            'showConfirmButton' => true,
            'cancelButtonText'  => __('Cancel'),
            'onConfirmed'       => 'delete',
        ]);
        $this->page = $page;
    }
}
