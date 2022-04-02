<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Contact; 
use App\Models\Language; 
use App\Models\Service; 
use App\Models\Portfolio; 
use App\Models\PortfolioImage; 
use App\Models\Team; 
use App\Models\Blog; 
use App\Models\Bcategory; 
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
   //Home page
    public function index()
    {
        return view('frontend.home');
    }

    //Terms page
    public function terms()
    {
        return view('auth.terms');
    }
    
    //Approval page
    public function approval()
    {
        return view('auth.approval');
    }
    
    //About page
    public function about()
    {
        return view('frontend.about');
    }

    //Contact page
    public function contact()
    {
        return view('frontend.contact');
    }

     //Portfolio page
     public function portfolio(Request $request) {
        if (session()->has('lang')) {
           $currlang = Language::where('code', session()->get('lang'))->first();
       } else {
           $currlang = Language::where('is_default', 1)->first();
       }

       $category = $request->category;
       $catid = null;
       if (!empty($category)) {
           $data['category'] = Service::where('slug', $category)->firstOrFail();
           $catid = $data['category']->id;
       }
       $data['all_services'] = Service::where('status', 1)->where('language_id', $currlang->id)->get();
       

       $data['portfolios'] = Portfolio::where('status',1)->where('language_id', $currlang->id)
                           ->when($catid, function ($query, $catid) {
                               return $query->where('service_id', $catid);
                           })
                           ->paginate(8);

       return view('frontend.portfolio', $data);
   }

   public function portfolioDetails($slug){
       if (session()->has('lang')) {
           $currlang = Language::where('code', session()->get('lang'))->first();
       } else {
           $currlang = Language::where('is_default', 1)->first();
       }

       $data['portfolio'] = Portfolio::where('slug', $slug)->where('language_id', $currlang->id)->firstOrFail();
       $data['portfolio_images'] = PortfolioImage::where('portfolio_id', $data['portfolio']->id)->get();

       return view('frontend.portfolio-details', $data);
   }

    //team page
    public function team() {
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $data['teams'] = Team::where('language_id', $currlang->id)->where('status',1)->paginate(6);

        return view('frontend.team', $data);
    }

    public function team_details($id){

        $team = Team::find($id);

        return view('frontend.team-details', compact('team'));
    }

    // Blog Page  Funtion
    public function blogs(Request $request){

        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        
        $category = $request->category;
        $catid = null;
        if (!empty($category)) {
            $data['category'] = Bcategory::where('slug', $category)->firstOrFail();
            $catid = $data['category']->id;
        }

        $term = $request->term;
        $month = $request->month;
        $year = $request->year;

        if (!empty($month) && !empty($year)) {
            $archive = true;
        } else {
            $archive = false;
        }

        $bcategories = Bcategory::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->get();

        $latestblogs = Blog::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->limit(4)->get();

        $blogs = Blog::where('status', 1)->where('language_id', $currlang->id)
                        ->when($catid, function ($query, $catid) {
                            return $query->where('bcategory_id', $catid);
                        })
                        ->when($term, function ($query, $term) {
                            return $query->where('title', 'like', '%'.$term.'%');
                        })
                        ->when($archive, function ($query) use ($month, $year) {
                            return $query->whereMonth('created_at', $month)->whereYear('created_at', $year);
                        })
                        ->paginate(5);

        return view('frontend.blogs', compact('blogs', 'bcategories', 'latestblogs'));
    }

    // Blog Details  Funtion
    public function blogdetails($slug) {

        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $blog = Blog::where('slug', $slug)->where('language_id', $currlang->id)->firstOrFail();
        $latestblogs = Blog::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->limit(4)->get();
        $bcategories = Bcategory::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->get();
       
        return view('frontend.blogdetails', compact('blog', 'bcategories', 'latestblogs'));
    }

    // Change Language
    public function changeLanguage($lang)
    {

        session()->put('lang', $lang);
        app()->setLocale($lang);

        return redirect()->route('front.home');
    }

}