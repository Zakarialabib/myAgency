<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Email;

use App\Livewire\Utils\WithSorting;
use App\Models\EmailTemplate;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;

#[Layout('components.layouts.dashboard')]
class Index extends Component
{
    use WithPagination;
    use WithSorting;

    public int $perPage;

    public $email;

    public array $orderable;

    #[Url(keep: true)]
    public $search = '';

    public array $selected = [];

    protected $listeners = [
        'refreshIndex' => '$refresh',
    ];

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
        $this->orderable = (new EmailTemplate())->orderable;
    }

    public function render()
    {
        $query = EmailTemplate::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $emails = $query->paginate($this->perPage);

        return view('livewire.admin.email.index', compact('emails'));
    }

    // Blog Category  Delete
    public function delete(EmailTemplate $email)
    {
        // abort_if(Gate::denies('email_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $email->delete();
    }
}
