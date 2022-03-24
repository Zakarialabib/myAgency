<?php

namespace App\Http\Controllers\Admin;


use App\Helpers\Helper;
use App\Models\Service;
use App\Models\Language;
use App\Models\Portfolio;
use App\Models\Sectiontitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
  
    public function index(){
        return view('admin.service.index');
    }

    // Add Service
    public function add(){
        return view('admin.service.add');
    }

    // Store Service
    public function store(Request $request){

      
       
        $slug = Helper::make_slug($request->title);
        $services = Service::select('slug')->get();
      
        $request->validate([
            'title' => [
              'required',
              'unique:services,title',
              'max:150',
              function($attribute, $value, $fail) use ($slug, $services) {
                  foreach($services as $service) {
                    if ($service->slug == $slug) {
                      return $fail('Title already taken!');
                    }
                  }
                }
            ],
            'image' => 'required|mimes:jpeg,jpg,png',
            'content' => 'required',
            'icon' => 'required',
            'language_id' => 'required',
            'serial_number' => 'required',
            'status' => 'required',
        ]);

        $service = new Service();


        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/front/img/service/', $image);

            $service->image = $image;
        }
        

        $service->title = $request->title;
        $service->icon = $request->icon;
        $service->serial_number = $request->serial_number;
        $service->slug = $slug;
        $service->content = $request->content;
        $service->language_id = $request->language_id;
        $service->status = $request->status;
        $service->save();

        $notification = array(
            'messege' => 'Service Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    // Service Delete
    public function delete($id){

        $service = Service::find($id);

        $portfolio = Portfolio::where('service_id', $id)->get();
        if($portfolio->count() >= 1){
            $notification = array(
                'messege' => 'First delete portfolio under this service !',
                'alert' => 'success'
            );
            return redirect()->back()->with('notification', $notification);
        }
        @unlink('assets/front/img/service/'. $service->image);
        $service->delete();

                
        $notification = array(
            'messege' => 'Service  Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    // Service Edit
    public function edit($id){

        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));

    }

    // Update Service
    public function update(Request $request, $id){

        $slug = Helper::make_slug($request->title);
        $services = Service::select('slug')->get();
        $service = Service::findOrFail($id);

         $request->validate([
            'title' => [
              'required',
              'max:150',
              function($attribute, $value, $fail) use ($slug, $services, $service) {
                  foreach($services as $serv) {
                    if ($service->slug != $slug) {
                      if ($serv->slug == $slug) {
                        return $fail('Title already taken!');
                      }
                    }
                  }
                },
                'unique:services,title,'.$id
            ],
            'image' => 'mimes:jpeg,jpg,png',
            'content' => 'required',
            'icon' => 'required',
            'language_id' => 'required',
            'serial_number' => 'required',
            'status' => 'required',
        ]);



        if($request->hasFile('image')){
            @unlink('assets/front/img/service/'. $service->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/front/img/service/', $image);

            $service->image = $image;
        }

        $service->title = $request->title;
        $service->icon = $request->icon;
        $service->serial_number = $request->serial_number;
        $service->slug = $slug;
        $service->content = $request->content;
        $service->language_id = $request->language_id;
        $service->status = $request->status;
        $service->save();

        $notification = array(
            'messege' => 'Service Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.service').'?language='.$this->lang->code)->with('notification', $notification);
    }

}
