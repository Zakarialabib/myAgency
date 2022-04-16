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
    
    public $language_id;

    public array $listsForFields = [];
    
    protected $listeners = [
        'confirmed'
    ];

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
        $this->orderable         = (new Blog())->orderable;
        $this->initListsForFields();
    }

    public function render()
    { 
        $static = Sectiontitle::where('page', 3)->where('language_id', $this->language_id)->first();

        $query = Blog::when($this->language_id, function ($query) {
            return $query->where('language_id', $this->language_id);
        })->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $blogs = $query->paginate($this->perPage);

        return view('livewire.admin.blog.index', compact('blogs','static'));
    }

    // Blog  Delete
    public function delete(blog $blog)
    {
        // abort_if(Gate::denies('blog_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $blog->delete();
        $this->alert('warning', __('Blog Deleted successfully!') );
    }
    
    // Blog  Clone
    public function clone(blog $blog)
    {
        $blog_details = Blog::find($blog->id);
        // dd($blog_details);
        Blog::create([
            'bcategory_id' => $blog_details->bcategory_id,
            'language_id' => $blog_details->language_id,
            'slug' => !empty($blog_details->slug) ? \Str::slug($blog_details->slug) : \Str::slug($blog_details->title) ,
            'status' => 0,
            'content' => $blog_details->content,
            'title' => $blog_details->title,
            'meta_keywords' => $blog_details->meta_keywords,
            'meta_description' => $blog_details->meta_description,
            'image' => $blog_details->image,
        ]);
        $this->alert('success', __('Blog Cloned successfully!') );
    }
}
