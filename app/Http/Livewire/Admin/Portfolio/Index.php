<?php

namespace App\Http\Livewire\Admin\Portfolio;

use Livewire\Component;
use App\Models\Language;
use App\Models\Portfolio;
use App\Models\Section;
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
        $this->orderable         = (new Portfolio())->orderable;
        $this->initListsForFields();
    }
    public function render()
    {
        $static = Section::where('page', 5)->where('language_id', $this->language_id)->first();

        $query = Portfolio::when($this->language_id, function ($query) {
            return $query->where('language_id', $this->language_id);
            })->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $portfolios = $query->paginate($this->perPage);

        return view('livewire.admin.portfolio.index', compact('portfolios', 'static'));
    }

     // Portfolio Category  Delete
     public function delete(Portfolio $portfolio)
     {
         // abort_if(Gate::denies('portfolio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
 
         $portfolio->delete();
     }

      // Portfolio  Clone
    public function clone(Portfolio $portfolio)
    {
        $portfolio_details = Portfolio::find($portfolio->id);
        // dd($portfolio_details);
        Portfolio::create([
            'service_id' => $portfolio_details->service_id,
            'language_id' => $portfolio_details->language_id,
            'title' => $portfolio_details->title,
            'slug' => !empty($portfolio_details->slug) ? \Str::slug($portfolio_details->slug) : \Str::slug($portfolio_details->title) ,
            'content' => $portfolio_details->content,
            'client_name' => $portfolio_details->client_name,
            'link' => $portfolio_details->link,
            'featured_image' => $portfolio_details->featured_image,
            'gallery' => $portfolio_details->gallery,
            'status' => 0,
            'meta_keywords' => $portfolio_details->meta_keywords,
            'meta_description' => $portfolio_details->meta_description,
        ]);
        // $this->alert('success', __('Portfolio Cloned successfully!') );
    }
     
}
