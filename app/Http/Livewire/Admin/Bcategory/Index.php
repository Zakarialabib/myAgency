<?php

namespace App\Http\Livewire\Admin\Bcategory;

use Livewire\Component;
use App\Models\Language;
use App\Models\Bcategory;
use Illuminate\Http\Response;
use Livewire\WithPagination;
use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use Str;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    public $language_id;

    public array $listsForFields = [];

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
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

    protected function initListsForFields(): void
    {
        $this->listsForFields['languages'] = Language::pluck('name', 'id')->toArray();
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Bcategory())->orderable;
        $this->initListsForFields();
    }

    public function render()
    {
        $query = Bcategory::when($this->language_id, function ($query) {
                return $query->where('language_id', $this->language_id);
            })->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $bcategories = $query->paginate($this->perPage);

        return view('livewire.admin.bcategory.index', compact('bcategories'));
    }

     // Blog Category  Delete
     public function delete(Bcategory $bcategory)
     {
         // abort_if(Gate::denies('bcategory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
 
         $bcategory->delete();
     }
     // Blog  Clone
    public function clone(Bcategory $bcategory)
    {
        $bcategory_details = Bcategory::find($bcategory->id);
        // dd($bcategory_details);
        Bcategory::create([
            'language_id' => $bcategory_details->language_id,
            'name' => $bcategory_details->name,
            'slug' => Str::slug($bcategory_details->name),
            'status' => 0
        ]);
        // $this->alert('success', __('Bcategory Cloned successfully!') );
    }
}
