<?php

namespace App\Http\Livewire\Admin\Service;

use Livewire\Component;
use App\Models\Language;
use App\Models\Service;
use App\Models\Section;
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
        $this->orderable         = (new Service())->orderable;
        $this->initListsForFields();
    }
    
    public function render()
    {
        $static = Section::where('page', 4)->where('language_id', $this->language_id)->first();

        $query = Service::when($this->language_id, function ($query) {
            return $query->where('language_id', $this->language_id);
            })->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $services = $query->paginate($this->perPage);

        return view('livewire.admin.service.index', compact('services','static'));
    }

      // Service  Delete
      public function delete(Service $service)
      {
          // abort_if(Gate::denies('service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
          $service->delete();
        //   $this->alert('warning', __('Service Deleted successfully!') );
      }
      

     // Service  Clone
     public function clone(Service $service)
     {
         $service_details = Service::find($service->id);
         // dd($service_details);
         Service::create([
             'language_id' => $service_details->language_id,
             'title' => $service_details->title,
             'slug' => !empty($service_details->slug) ? \Str::slug($service_details->slug) : \Str::slug($service_details->title) ,
             'image' => $service_details->image,
             'content' => $service_details->content,
             'status' => 0,
         ]);
         // $this->alert('success', __('Service Cloned successfully!') );
     }
}
