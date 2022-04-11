<?php

namespace App\Http\Livewire\Admin\Portfolio;

use Livewire\Component;
use Str;
use App\Models\Portfolio;
use App\Models\Language;
use App\Models\PortfolioImage;
use App\Models\Service;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public Portfolio $portfolio;
    
    public $images;
    
    public $featured_image;

    public array $listsForFields = [];

    protected $listeners = [
        'submit',
    ];

    protected function initListsForFields(): void
    {
        $this->listsForFields['services'] = Service::pluck('title', 'id')->toArray();
    }

    public function mount(Portfolio $portfolio)
    {
        $this->portfolio = $portfolio;
        $this->initListsForFields();
    }

    public function submit()
    {
        $this->portfolio->slug = Str::slug($this->portfolio->title);
        
        if($this->featured_image){
            $file = $this->featured_image->store("portfolio",'public');
            $this->portfolio->featured_image = $file;
        }
        
        // Multiple images within an array

        foreach($this->images as $key=>$image){
            $this->images[$key] = $image->store('portfolio','public');            
        }      
        
        $this->images = json_encode($this->images);
        
        $this->portfolio->gallery = $this->images;

        $this->portfolio->save();

        // $this->alert('success', __('Service created successfully!') );

        return redirect()->route('admin.portfolios.index');

    }
    public function render()
    {
        return view('livewire.admin.portfolio.create');
    }

    protected $rules = [    
        'portfolio.title' => 'required|unique:portfolios,title|max:191',
        'portfolio.status' => 'required',
        'portfolio.content' => 'required',
        'portfolio.client_name' => 'required',
        'portfolio.link' => 'required',
        'portfolio.service_id' => 'required',
        'portfolio.meta_keywords' => 'required',
        'portfolio.meta_description' => 'required',
        'portfolio.language_id' => 'required',
    ]; 

}
