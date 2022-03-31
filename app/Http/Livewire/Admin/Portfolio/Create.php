<?php

namespace App\Http\Livewire\Admin\Portfolio;

use Livewire\Component;
use App\Helpers\Helper;
use App\Models\Portfolio;
use App\Models\Language;
use App\Models\PortfolioImage;

class Create extends Component
{
    public Portfolio $portfolio;
    
    protected $listeners = [
        'submit',
    ];

    public function mount(Portfolio $portfolio)
    {
        $this->portfolio = $portfolio;
    }

    public function submit()
    {
        $slug = Helper::make_slug($request->title);
        $Portfolios = Portfolio::select('slug')->get();

        $this->validate();

        if($request->hasFile('featured_image')){

            $file = $request->file('featured_image');
            $extension = $file->getClientOriginalExtension();
            $featured_image = time().rand().'.'.$extension;
            $file->move('assets/front/img/portfolio/', $featured_image);

            $portfolio->featured_image = $featured_image;
        }

        $this->portfolio->save();

        if($this->hasFile('image')){
            $files = $request->file('image');
            $count = 1;
            foreach ($files as $file){
                    $extension = $file->getClientOriginalExtension();
                    $image = 'portfolio_'.$count.time().rand().'.'.$extension;
                    $file->move('assets/front/img/portfolio/', $image);
                    $portfolio_slider = new PortfolioImage();
                    $portfolio_slider->image = $image;
                    $portfolio_slider->portfolio_id = $portfolio_id;
                    $portfolio_slider->save();
                    $count++;
            }
        }
    }
    public function render()
    {
        return view('livewire.admin.portfolio.create');
    }

    public function rules() { 
        return [
            'image[]' => 'mimes:jpeg,jpg,png',
            'featured_image' => 'required|mimes:jpeg,jpg,png',
            'title' => [
                'required',
                'unique:blogs,title',
                'max:255',
            ],
            'client_name' => 'required|max:250',
            'start_date' => 'required|max:250',
            'status' => 'required|max:250',
            'service_id' => 'required',
            'content' => 'required',
            'serial_number' => 'required',
            'language_id' => 'required',
    ]; 
}
}
