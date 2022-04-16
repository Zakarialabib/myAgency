<?php

namespace App\Http\Livewire\Admin\Sectiontitle;

use Livewire\Component;
use App\Models\Language;
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
        $this->orderable         = (new Sectiontitle())->orderable;
        $this->initListsForFields();
    }
    
    public function render()
    {
        $query = Sectiontitle::when($this->language_id, function ($query) {
            return $query->where('language_id', $this->language_id);
            })->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $sectiontitles = $query->paginate($this->perPage);

        return view('livewire.admin.sectiontitle.index', compact('sectiontitles'));
    }

      // Sectiontitle  Delete
      public function delete(Sectiontitle $sectiontitle)
      {
          // abort_if(Gate::denies('sectiontitle_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
          $sectiontitle->delete();
        //   $this->alert('warning', __('Sectiontitle Deleted successfully!') );
      }
      

     // Sectiontitle  Clone
     public function clone(Sectiontitle $sectiontitle)
     {
         $sectiontitle_details = Sectiontitle::find($sectiontitle->id);
         // dd($sectiontitle_details);
         Sectiontitle::create([
             'language_id' => $sectiontitle_details->language_id,
             'page' => $sectiontitle_details->page,
             'title' => $sectiontitle_details->title,
             'subtitle' => $sectiontitle_details->subtitle,
             'text' => $sectiontitle_details->text,
             'button' => $sectiontitle_details->button,
             'link' => $sectiontitle_details->link,
             'video' => $sectiontitle_details->video,
             'image' => $sectiontitle_details->image,
             'content' => $sectiontitle_details->content,
             'status' => 0,
         ]);
         // $this->alert('success', __('Sectiontitle Cloned successfully!') );
     }
}
