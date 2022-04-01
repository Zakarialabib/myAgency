<?php

namespace App\Http\Livewire\Admin\Portfolio;

use Livewire\Component;
use App\Models\Language;
use App\Models\Portfolio;
use App\Models\Sectiontitle;
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
        $this->orderable         = (new Portfolio())->orderable;
        $this->lang = Language::where('is_default', 1)->first();
    }
    public function render()
    {
        // $lang = Language::where('code', $this->language)->first()->id;

        $sectiontitle = Sectiontitle::where('language_id', $this->lang)->first();

        $query = Portfolio::where('language_id', $this->lang)->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $portfolios = $query->paginate($this->perPage);

        return view('livewire.admin.portfolio.index', compact('portfolios','sectiontitle'));
    }

     // Blog Category  Delete
     public function delete(Portfolio $portfolio)
     {
         // abort_if(Gate::denies('portfolio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
 
         $portfolio->delete();
     }
     
}
