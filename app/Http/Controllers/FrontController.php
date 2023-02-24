<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Page;
use App\Models\Service;
use App\Models\Project;
use App\Models\Section;
use Artisan;
use Illuminate\Support\Facades\Log;
use Throwable;

class FrontController extends Controller
{
    //Optimization page
    public function optimize()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');

        return back();
    }

    public function index()
    {
        $section = Section::find(1);
        $services = Service::all();
        $projects = Project::all();

        return view('front.index', compact('section','services', 'projects'));
    }

    public function categories()
    {
        return view('front.categories');
    }

    public function categoryPage($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        return view('front.category-page', compact('category'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function blog()
    {
        $blogs = Blog::with('category')->get();

        return view('front.blog', compact('blogs'));
    }

    public function blogPage($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        return view('front.blog-page', compact('blog'));
    }

    public function dynamicPage($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        return view('front.dynamic-page', compact('page'));
    }

      //Project page
      public function project(Request $request)
      {
          $section = Section::where('page', 6)->firstOrFail();

          $projects = Project::where('status', 1)
              ->when($catid, function ($query, $catid) {
                  return $query->where('service_id', $catid);
              })
              ->paginate(8);

          return view('front.project', compact('project', 'section'));
      }

     public function portfolioDetails($slug)
     {
         $project = Project::where('slug', $slug)->firstOrFail();

         return view('front.project-details', compact('project'));
     }

    public function generateSitemaps()
    {
        try {
            Artisan::call('generate:sitemap');

            Log::info('Backup completed successfully!');

            return back();
        } catch (Throwable $th) {
            Log::info('Backup failed!', $th->getMessage());

            return back();
        }
    }

      // Change Language
      public function changeLanguage($lang)
      {
          session()->put('lang', $lang);
          app()->setLocale($lang);

          return redirect()->route('front.index');
      }
}
