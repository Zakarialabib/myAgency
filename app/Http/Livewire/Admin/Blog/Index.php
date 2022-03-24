<?php

namespace App\Http\Livewire\Admin\Blog;

use Livewire\Component;
use App\Models\Language;
use App\Models\Blog;
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
        $this->orderable         = (new Blog())->orderable;
        // $this->lang = Language::where('is_default', 1)->first();
    }

    public function render()
    {
        $lang = Language::where('id', $this->lang)->first();
        // dd($this->lang->id);
        $sectiontitle = Sectiontitle::where('language_id', $this->lang)->first();
        // dd($query);
        
        $query = Blog::when($lang, function ($query) {
            return $query->where('language_id', $lang);
        })->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $blogs = $query->paginate($this->perPage);

        return view('livewire.admin.blog.index', compact('blogs','sectiontitle'));
    }
}
