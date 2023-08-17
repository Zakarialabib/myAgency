<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use App\Livewire\Utils\WithSorting;
use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class Contacts extends Component
{
    use WithPagination;
    use WithSorting;

    public int $perPage;

    public array $orderable;

    #[Url(keep: true)]
    public $search = '';

    public $showDeleteModal = false;

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
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable = (new Contact())->orderable;
    }

    public function render()
    {
        $query = Contact::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $contacts = $query->paginate($this->perPage);

        return view('livewire.admin.contacts', compact('contacts'))
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function deleteSelected()
    {
        Contact::whereIn('id', $this->selected)->delete();

        $this->showDeleteModal = false;

        $this->resetSelected();

        $this->reRenderParent();
    }

    public function delete(Contact $contact)
    {
        $contact->delete();

        $this->alert('warning', __('Contact deleted successfully!'));

        $this->reRenderParent();
    }
}
