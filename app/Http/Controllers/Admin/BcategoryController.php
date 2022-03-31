<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Blog;
use App\Models\Language;
use App\Models\Bcategory;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BcategoryController extends Controller
{

    public function index()
    {
        return view('admin.blog.blog-category.index');
    }

    // Add Blog Category
    public function create()
    {
        return view('admin.blog.blog-category.create');
    }

    // Blog Category Delete
    public function delete($id)
    {

        $bcategory = Bcategory::find($id);
        $blogs = Blog::where('bcategory_id', $id)->get();
        foreach ($blogs as $data) {

            $data->delete();
        }
        $bcategory->delete();

    }

    public function show(Bcategory $bcategory)
    {
        return view('admin.blog.blog-category.show', compact('bcategory'));
    }

    // Blog Category Edit
    public function edit(Bcategory $bcategory)
    {
        return view('admin.blog.blog-category.edit', compact('bcategory'));
    }

    // Blog Skill Category
    public function update(Request $request, $id)
    {
     
        $slug = Helper::make_slug($request->name);
        $bcategories = Bcategory::select('slug')->get();
        $bcategory = Bcategory::findOrFail($id);

        $request->validate([
            'name' => [
                'required',
                'max:150',
                function ($attribute, $value, $fail) use ($slug, $bcategories, $bcategory) {
                    foreach ($bcategories as $serv) {
                        if ($bcategory->slug != $slug) {
                            if ($serv->slug == $slug) {
                                return $fail('Title already taken!');
                            }
                        }
                    }
                },
                'unique:bcategories,name,'.$id
            ],
            'status' => 'required',
        ]);

        $bcategory = Bcategory::find($id);
        $bcategory->name = $request->name;
        $bcategory->status = $request->status;
        $bcategory->slug = $slug;
        $bcategory->save();

        $notification = array(
            'messege' => 'La catégorie du blog a été mise à jour avec succès!',
            'alert' => 'success'
        );
        return redirect(route('admin.bcategory').'?language='.$this->lang->code)->with('notification', $notification);
    }
}
