<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Settings;

use App\Livewire\Utils\WithSorting;
use App\Models\Redirect;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class Redirects extends Component
{
    use LivewireAlert;
    use WithPagination;
    use WithSorting;

    public $listeners = ['delete', 'refreshIndex' => '$refresh'];

    public $editModal = false;

    public $redirect;

    public $refreshIndex;

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

    protected $rules = [
        'redirect.old_url' => 'required',
        'redirect.new_url' => 'nullable',
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
        $this->orderable = (new Redirect())->orderable;
    }

    public function editModal($id)
    {
        $this->redirect = Redirect::find($id);
        $this->editModal = true;
    }

    public function update()
    {
        $this->validate();

        $this->redirect->save();

        $this->alert('warning', __('Redirect updated successfully!'));

        $this->editModal = false;

        $this->dispatch('refreshIndex');
    }

    public function delete(Redirect $redirect)
    {
        $redirect->delete();

        $this->alert('warning', __('Redirect deleted successfully!'));
    }

    public function render()
    {
        $query = Redirect::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $redirects = $query->paginate($this->perPage);

        return view('livewire.admin.settings.redirects', compact('redirects'));
    }
}
