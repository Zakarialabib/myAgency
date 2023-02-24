<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Section;

use App\Http\Livewire\Utils\WithSorting;
use App\Models\Language;
use App\Models\Section;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;
    use WithSorting;
    use WithFileUploads;

    public $image;

    public $section;

    public $listeners = [
        'refreshIndex' => '$refresh',
        'showModal',  'delete',
    ];

    public $refreshIndex;

    public $showModal = false;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    public $language_id;

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

    public function getLanguagesProperty(): Collection
    {
        return Language::select('name', 'id')->get();
    }

    public function mount()
    {
        $this->sortBy = 'id';
        $this->sortDirection = 'desc';
        $this->perPage = 100;
        $this->paginationOptions = [25, 50, 100];
        $this->orderable = (new Section())->orderable;
    }

    public function render()
    {
        $query = Section::when($this->language_id, function ($query) {
            return $query->where('language_id', $this->language_id);
        })->advancedFilter([
            's' => $this->search ?: null,
            'order_column' => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $sections = $query->paginate($this->perPage);

        return view('livewire.admin.section.index', compact('sections'));
    }

     // Section  Delete
      public function delete(Section $section)
      {
        //   abort_if(Gate::denies('section_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

          $section->delete();

          $this->alert('warning', __('Section Deleted successfully!'));
      }

     // Section  Clone
     public function clone(Section $section)
     {
         $section_details = Section::find($section->id);

         Section::create([
             'language_id' => $section_details->language_id,
             'page' => $section_details->page,
             'title' => $section_details->title,
             'subtitle' => $section_details->subtitle,
             'text' => $section_details->text,
             'button' => $section_details->button,
             'link' => $section_details->link,
             'video' => $section_details->video,
             'image' => $section_details->image,
             'content' => $section_details->content,
             'status' => 0,
         ]);
         $this->alert('success', __('Section Cloned successfully!'));
     }
}
