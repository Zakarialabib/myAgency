<?php

namespace App\Http\Livewire\Admin\Portfolio;

use Livewire\Component;
use App\Helpers\Helper;
use App\Models\Service;
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


        $request->validate([
            'image[]' => 'mimes:jpeg,jpg,png',
            'featured_image' => 'required|mimes:jpeg,jpg,png',
            'title' => [
                'required',
                'unique:portfolios,title',
                'max:255',
                function($attribute, $value, $fail) use ($slug, $Portfolios){
                    foreach($Portfolios as $port){
                        if($port->slug == $slug){
                            return $fail('Title already taken!');
                        }
                    }
                }
            ],
            'client_name' => 'required|max:250',
            'start_date' => 'required|max:250',
            'status' => 'required|max:250',
            'service_id' => 'required',
            'content' => 'required',
            'serial_number' => 'required',
            'language_id' => 'required',
        ]);


        $portfolio = new Portfolio();

        if($request->hasFile('featured_image')){

            $file = $request->file('featured_image');
            $extension = $file->getClientOriginalExtension();
            $featured_image = time().rand().'.'.$extension;
            $file->move('assets/front/img/portfolio/', $featured_image);

            $portfolio->featured_image = $featured_image;
        }


        $portfolio->title = $request->title;
        $portfolio->language_id = $request->language_id;
        $portfolio->status = $request->status;
        $portfolio->content = $request->content;
        $portfolio->slug = $slug;
        $portfolio->start_date = $request->start_date;
        $portfolio->submission_date = $request->submission_date;
        $portfolio->link = $request->link;
        $portfolio->service_id = $request->service_id;
        $portfolio->client_name = $request->client_name;
        $portfolio->serial_number = $request->serial_number;
        $portfolio->meta_keywords = $request->meta_keywords;
        $portfolio->meta_description = $request->meta_description;
        $portfolio->save();
        $portfolio_id = $portfolio->id;

  

        if($request->hasFile('image')){
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
}
