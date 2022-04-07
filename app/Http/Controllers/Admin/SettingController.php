<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
	public function index(Setting $setting)
    {
        // abort_if(Gate::denies('admin_settings_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.index',compact('setting'));
    }


   // Announcement Popup
   public function announcement(Request $request)
   {
	$lang = Language::where('code', $request->language)->first()->id;
	$st = Setting::where('language_id', $lang)->first();

	return view('admin.settings.announcement', compact('st'));
   }

   public function update_announcement(Request $request, $id){
	   
	$request->validate([
		'announcement_delay' => 'required',
		'announcement' => 'mimes:jpeg,jpg,png',
	  ]);
 
 
	 $st = Setting::where('language_id', $id)->first();


	 if($request->hasFile('announcement')){
		@unlink('assets/front/img/'. $st->announcement);
		$file = $request->file('announcement');
		$extension = $file->getClientOriginalExtension();
		$announcement = time().rand().'.'.$extension;
		$file->move('assets/front/img/', $announcement);
		$st->announcement = $announcement;
	}

	if ($request->filled('announcement_delay')) {
		$st->announcement_delay = $request->announcement_delay;
	} else {
		$st->announcement_delay = 0.00;
	}

	if($request->is_announcement == 'on'){
		$st->is_announcement = 1;
	}else{
		$st->is_announcement = 0;
    }

	$st->save();

	   return redirect(route('admin.announcement.index').'?language='.$this->lang->code)->with('notification', $notification);
   }

}