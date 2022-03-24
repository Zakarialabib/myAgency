<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Service;
use App\Models\Language;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\PortfolioImage;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{

    public function index(Request $request){

        return view('admin.portfolio.index');
    }

    public function portfolio_get_category($id){

        $services = Service::where('status', 1)->where('language_id', $id)->get();
        $output = '';

        foreach($services as $service){
            $output .= '<option value="'.$service->id.'">'.$service->title.'</option>';
        }
        return $output;
    }

    // Add Portfolio 
    public function create(Portfolio $portfolio){
        return view('admin.portfolio.create', compact('portfolio'));
    }
    

    // Portfolio  Delete
    public function delete($id){

        $sliders = PortfolioImage::where('portfolio_id', $id)->get();

        foreach ($sliders as $slider){
            unlink('assets/front/img/portfolio/'. $slider->image);
            $slider->delete();
        }

        $portfolio = Portfolio::find($id);
        @unlink('assets/front/img/portfolio/'. $portfolio->featured_image);
        $portfolio->delete();

        
        $notification = array(
            'messege' => 'Portfolio  Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    // Portfolio  Edit
    public function edit($id){
       
        $portfolio = Portfolio::findOrFail($id);
        $blog_lan = $portfolio->language_id;
       
        $services = Service::where('status', 1)->where('language_id', $blog_lan)->get();
        
        $sliders = PortfolioImage::where('portfolio_id', $id)->get();
        
        return view('admin.portfolio.edit', compact('portfolio', 'services', 'sliders'));

    }

    // Portfolio Update
    public function update(Request $request, $id){


        $sliders = $request->sliders;
        if($sliders != null){
            $files = $request->sliders;
            // $count = 1;
             foreach ($files as $file){
                     $slider = PortfolioImage::where('id',  $file)->first();
                     @unlink('assets/front/img/portfolio/'. $slider->image);
                     $slider->delete();
             }
        }


        $slug = Helper::make_slug($request->title);
        $portfolios = Portfolio::select('slug')->get();
        $portfolio = Portfolio::findOrFail($id);

        $request->validate([
            'image[]' => 'mimes:jpeg,jpg,png',
            'featured_image' => 'mimes:jpeg,jpg,png',
            'title' => [
                'required',
                'max:255',
                function($attribute, $value, $fail) use ($slug, $portfolios, $portfolio){
                    foreach($portfolios as $blg){
                        if($portfolio->slug != $slug){
                            if($blg->slug == $slug){
                                return $fail('Title already taken!');
                            }
                        }
                    }
                },
                'unique:portfolios,title,'.$id
            ],
            'client_name' => 'required|max:250',
            'start_date' => 'required|max:250',
            'status' => 'required|max:250',
            'service_id' => 'required',
            'content' => 'required',
            'serial_number' => 'required',
            'language_id' => 'required',

        ]);

        if($request->hasFile('featured_image')){
            @unlink('assets/front/img/portfolio/'. $portfolio->featured_image);

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



        $notification = array(
            'messege' => 'Portfolio Updated successfully!',
            'alert' => 'success'
        );

        return redirect(route('admin.portfolios.index').'?language='.$this->lang->code)->with('notification', $notification);

    }

}
