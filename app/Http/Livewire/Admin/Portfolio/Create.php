<?php

namespace App\Http\Livewire\Admin\Portfolio;

use Livewire\Component;
use Str;
use App\Models\Portfolio;
use App\Models\Language;
use App\Models\PortfolioImage;
use App\Models\Service;

class Create extends Component
{
    public Portfolio $portfolio;
    
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
            $file = $this->featured_image->store("/");
            $this->portfolio->featured_image = $file;
        }
        
        $this->portfolio->save();

    }
    public function render()
    {
        return view('livewire.admin.portfolio.create');
    }

    protected $rules = [    
        'blog.title' => 'required|unique:portfolios,title|max:191',
        'blog.status' => 'required',
        'blog.content' => 'required',
        'blog.service_id' => 'required',
        'blog.meta_keywords' => 'required',
        'blog.meta_description' => 'required',
        'blog.language_id' => 'required',
    ]; 

}
