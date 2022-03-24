<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Setting;
use App\Models\Language;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use App\Http\Controllers\Controller;

class FooterController extends Controller
{
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }

    public function index(Request $request){

         $lang = Language::where('code', $request->language)->first()->id;
   
        $footerinfo = Setting::where('language_id', $lang)->first();

        return view('admin.footer.index', compact('footerinfo'));
    }

    public function update(Request $request, $id){


        $request->validate([
            'copyright_text' => 'required|max:250',
            'footer_text' => 'required',
            'footer_logo' => 'mimes:jpeg,jpg,png',
       ]);
  
       $footerinfo = Setting::where('language_id', $id)->first();

        if($request->hasFile('footer_logo')){
           @unlink('assets/front/img/'. $footerinfo->footer_logo);
           $file = $request->file('footer_logo');
           $extension = $file->getClientOriginalExtension();
           $footer_logo = 'footer_logo_'.time().rand().'.'.$extension;
           $file->move('assets/front/img/', $footer_logo);
           $footerinfo->footer_logo = $footer_logo;
       }

       $footerinfo->copyright_text = Purifier::clean($request->copyright_text);
       $footerinfo->footer_text = $request->footer_text;
       $footerinfo->save();


      $notification = array(
            'messege' => 'Info bas de page actualisé avec succès!',
            'alert' => 'success'
        );
        return redirect(route('admin.footer.index').'?language='.$this->lang->code)->with('notification', $notification);
    }
}