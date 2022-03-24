<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TeamController extends Controller
{

    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }

    public function team(Request $request){
        $lang = Language::where('code', $request->language)->first()->id;

        $data['teams'] = Team::where('language_id', $lang)->orderBy('id', 'DESC')->get();
        return view('admin.team.index', $data);
    }

    //Add team
    public function add(){
        return view('admin.team.add');
    }

    // Store team
    public function store(Request $request){


        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png',
            'name' => 'required|max:100',
            'dagenation' => 'required|max:100'
        ]);
        
        $team = new Team();

        if($request->hasFile('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $image);

            $team->image = $image;
        }

        $team->language_id = $request->language_id;
        $team->name = $request->name;
        $team->status = $request->status;
        $team->dagenation = $request->dagenation;

        if($request->icon1 && $request->url1){
            $team->icon1 = $request->icon1;
            $team->url1 = $request->url1;
        }else{
            $team->icon1 = null;
            $team->url1 = null;
        }
        if($request->icon2 && $request->url2){
            $team->icon2 = $request->icon2;
            $team->url2 = $request->url2;
        }else{
            $team->icon2 = null;
            $team->url2 = null;
        }

        if($request->icon3 && $request->url3){
            $team->icon3 = $request->icon3;
            $team->url3 = $request->url3;
        }else{
            $team->icon3 = null;
            $team->url3 = null;
        }


        $team->save();


        $notification = array(
            'messege' => 'Team Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    //team Delete
    public function delete($id){

        $team = Team::find($id);
        @unlink('assets/front/img/'. $team->image);
        $team->delete();
        
        return back();
    }

    //team Edit
    public function edit($id){

        $team = Team::find($id);
        return view('admin.team.edit', compact('team'));

    }

    // team Update
    public function update(Request $request, $id){

        $request->validate([
            'image' => 'mimes:jpeg,jpg,png',
            'name' => 'required|max:100',
            'dagenation' => 'required|max:100'
        ]);

        $team = Team::findOrFail($id);

        if($request->hasFile('image')){
            @unlink('assets/front/img/'. $team->image);
            
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $image);

            $team->image = $image;
        }

        $team->language_id = $request->language_id;
        $team->name = $request->name;
        $team->status = $request->status;
        $team->dagenation = $request->dagenation;

        if($request->icon1 && $request->url1){
            $team->icon1 = $request->icon1;
            $team->url1 = $request->url1;
        }else{
            $team->icon1 = null;
            $team->url1 = null;
        }
        if($request->icon2 && $request->url2){
            $team->icon2 = $request->icon2;
            $team->url2 = $request->url2;
        }else{
            $team->icon2 = null;
            $team->url2 = null;
        }

        if($request->icon3 && $request->url3){
            $team->icon3 = $request->icon3;
            $team->url3 = $request->url3;
        }else{
            $team->icon3 = null;
            $team->url3 = null;
        }

        $team->update();

        $notification = array(
            'messege' => 'Team Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.team').'?language='.$this->lang->code)->with('notification', $notification);;

    }
}