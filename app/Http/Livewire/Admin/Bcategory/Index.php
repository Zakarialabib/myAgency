<?php

namespace App\Http\Livewire\Admin\Bcategory;

use Livewire\Component;
use App\Models\Language;
use App\Models\Bcategory;
use Illuminate\Http\Response;
use Livewire\WithPagination;
use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;

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

    public $lang, $language;

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Bcategory())->orderable;
        $this->lang = Language::where('is_default', 1)->first();
    }
    public function render()
    {
        // $lang = Language::where('code', $this->language)->first()->id;
        
        $query = Bcategory::where('language_id', $this->lang)->advancedFilter([
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
     
}
