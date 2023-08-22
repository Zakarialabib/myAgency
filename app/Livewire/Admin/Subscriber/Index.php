<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Subscriber;

use App\Livewire\Utils\WithSorting;
use App\Models\Subscriber;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class Index extends Component
{
    use WithPagination;
    use WithSorting;

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
        $this->orderable = (new Subscriber())->orderable;
    }

    public function render()
    {
        $query = Subscriber::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $subscribers = $query->paginate($this->perPage);

        return view('livewire.admin.subscriber.index', compact('subscribers'));
    }
}
