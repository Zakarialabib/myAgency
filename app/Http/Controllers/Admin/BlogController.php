<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Blog;
use App\Models\Language;
use App\Models\Bcategory;
use App\Models\Sectiontitle;
use App\Helpers\Helper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
   
    public function index(){
             
        return view('admin.blog.index');
    }

    // Add Blog 
    public function create(){
        return view('admin.blog.create');
    }

    public function blog_get_category($id){

        $bcategories = Bcategory::where('status', 1)->where('language_id', $id)->get();
        $output = '';

        foreach($bcategories as $bcategory){
            $output .= '<option value="'.$bcategory->id.'">'.$bcategory->name.'</option>';
        }
        return $output;
    }



    // Blog  Delete
    public function delete($id){

        $blog = Blog::find($id);
        @unlink('assets/front/img/'. $blog->main_image);
        $blog->delete();

        $notification = array(
            'messege' => 'Article du blog supprimée avec succès !',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    // Blog  Edit
    public function edit($id){
       
        $blog = Blog::findOrFail($id);
        $blog_lan = $blog->language_id;
       
        $bcategories = Bcategory::where('status', 1)->where('language_id', $blog_lan)->get();
        
        return view('admin.blog.edit', compact('bcategories', 'blog'));

    }

    // Blog Update
    public function update(Request $request, $id){

        $slug = Helper::make_slug($request->title);
        $blogs = Blog::select('slug')->get();
        $blog = Blog::findOrFail($id);

        $request->validate([
            'main_image' => 'mimes:jpeg,jpg,png',
            'title' => [
                'required',
                'max:255',
                function($attribute, $value, $fail) use ($slug, $blogs, $blog){
                    foreach($blogs as $blg){
                        if($blog->slug != $slug){
                            if($blg->slug == $slug){
                                return $fail('Title already taken!');
                            }
                        }
                    }
                },
                'unique:blogs,title,'.$id
            ],
            'status' => 'required',
            'content' => 'required',
            'bcategory_id' => 'required',
            'language_id' => 'required',

        ]);

        if($request->hasFile('main_image')){
            @unlink('assets/front/img/'. $blog->main_image);

            $file = $request->file('main_image');
            $extension = $file->getClientOriginalExtension();
            $main_image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $main_image);

            $blog->main_image = $main_image;
            
        }

        $blog->title = $request->title;
        $blog->language_id = $request->language_id;
        $blog->status = $request->status;
        $blog->content = Purifier::clean($request->content);
        $blog->slug = $slug;
        $blog->bcategory_id = $request->bcategory_id;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;

        $blog->save();

        $notification = array(
            'messege' => 'Article de blog à jour avec succès!',
            'alert' => 'success'
        );

        return redirect(route('admin.blog').'?language='.$this->lang->code)->with('notification', $notification);

    }

    public function blogcontent(Request $request, $id){
        
        $request->validate([
            'blog_title' => 'required',
            'blog_subtitle' => 'required'
        ]);
        // dd($request->all());
        $blog_title = Sectiontitle::where('language_id', $id)->first();


        $blog_title->blog_title = $request->blog_title;
        $blog_title->blog_subtitle = $request->blog_subtitle;
        $blog_title->save();

        $notification = array(
            'messege' => 'Contenue des Articles blog à jour avec succès!',
            'alert' => 'success'
        );
        return redirect(route('admin.blog').'?language='.$this->lang->code)->with('notification', $notification);
    }
}
