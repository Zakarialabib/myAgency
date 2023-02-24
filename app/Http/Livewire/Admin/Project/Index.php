<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Project;

use App\Http\Livewire\Utils\WithSorting;
use App\Models\Language;
use App\Models\Project;
use App\Models\Section;
use Livewire\Component;
use Livewire\WithPagination;
use Str;

class Index extends Component
{
    use WithPagination;
    use WithSorting;

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

    public function mount()
    {
        $this->sortBy = 'id';
        $this->sortDirection = 'desc';
        $this->perPage = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable = (new Project())->orderable;
        $this->initListsForFields();
    }

    public function render()
    {
        // $static = Section::where('page', 5)->where('language_id', $this->language_id)->first();

        $query = Project::when($this->language_id, function ($query) {
            return $query->where('language_id', $this->language_id);
        })->advancedFilter([
            's' => $this->search ?: null,
            'order_column' => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $projects = $query->paginate($this->perPage);

        return view('livewire.admin.project.index', compact('projects'));
    }

     // Project Category  Delete
     public function delete(Project $project)
     {
         // abort_if(Gate::denies('portfolio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

         $project->delete();
     }

      // Project  Clone
    public function clone(Project $project)
    {
        $portfolio_details = Project::find($project->id);
        // dd($portfolio_details);
        Project::create([
            'service_id' => $portfolio_details->service_id,
            'language_id' => $portfolio_details->language_id,
            'title' => $portfolio_details->title,
            'slug' => ! empty($portfolio_details->slug) ? Str::slug($portfolio_details->slug) : Str::slug($portfolio_details->title),
            'content' => $portfolio_details->content,
            'client_name' => $portfolio_details->client_name,
            'link' => $portfolio_details->link,
            'featured_image' => $portfolio_details->featured_image,
            'gallery' => $portfolio_details->gallery,
            'status' => 0,
            'meta_keywords' => $portfolio_details->meta_keywords,
            'meta_description' => $portfolio_details->meta_description,
        ]);
        // $this->alert('success', __('Project Cloned successfully!') );
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['languages'] = Language::pluck('name', 'id')->toArray();
    }
}
