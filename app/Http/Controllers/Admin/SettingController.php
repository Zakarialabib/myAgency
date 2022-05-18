<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Helpers\Helper;
use DB;

class SettingController extends Controller
{
	public function index(Setting $setting)
    {
        // abort_if(Gate::denies('admin_settings_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $setting = Setting::query();

        $website_title = Setting::where('key','website_title')->first();
        $base_color = Setting::where('key','base_color')->first();
		// dd($base_color);
        $email = Setting::where('key','email')->first();
        $phone_number = Setting::where('key','phone_number')->first();
		$address=  Setting::where('key','address')->first();
		$footer_text=  Setting::where('key','footer_text')->first();
		$copyright_text=  Setting::where('key','copyright_text')->first();
		$meta_keywords=  Setting::where('key','meta_keywords')->first();
		$meta_description=  Setting::where('key','meta_description')->first();
		$social_facebook=  Setting::where('key','social_facebook')->first();
		$social_twitter=  Setting::where('key','social_twitter')->first();
		$social_instagram= Setting::where('key','social_instagram')->first();
		$social_linkedin= Setting::where('key','social_linkedin')->first();
		$social_whatsapp= Setting::where('key','social_whatsapp')->first();
		$head_tags = Setting::where('key','head_tags')->first();
		$body_tags = Setting::where('key','body_tags')->first();
		$announcement = Setting::where('key','announcement')->first();
		$announcement_delay = Setting::where('key','announcement_delay')->first();
		$cookie_alert_text = Setting::where('key','cookie_alert_text')->first();
		$is_preloader= Setting::where('key','is_preloader')->first();
		$preloader_icon= Setting::where('key','preloader_icon')->first();
		$preloader_bg_color= Setting::where('key','preloader_bg_color')->first();
		$is_whatsapp= Setting::where('key','is_whatsapp')->first();
		$is_cooki_alert= Setting::where('key','is_cooki_alert')->first();

        return view('admin.settings.index', compact('setting','website_title','base_color','email','phone_number','address','footer_text','copyright_text','meta_keywords','meta_description','social_facebook','social_twitter','social_instagram','social_linkedin','social_whatsapp','head_tags','body_tags','announcement','announcement_delay','cookie_alert_text','is_preloader','preloader_icon','preloader_bg_color','is_whatsapp','is_cooki_alert'));
    }
    
    public function business_setup(Request $request){

        $lang = Language::where('code', session()->get('lang'))->first();

        $curr_logo = Setting::where(['key' => 'site_logo'])->first();
        if ($request->has('site_logo')) {
            $image_name = Helper::update('business/', $curr_logo->value, 'png', $request->file('site_logo'));
        } else {
            $image_name = $curr_logo['value'];
        }

        DB::table('settings')->updateOrInsert(['key' => 'site_logo'], [
            'value' => $image_name
        ]);

        $fav_icon = Setting::where(['key' => 'fav_icon'])->first();
        if ($request->has('fav_icon')) {
            $image_name = Helper::update('business/', $fav_icon->value, 'png', $request->file('fav_icon'));
        } else {
            $image_name = $fav_icon['value'];
        }

        DB::table('settings')->updateOrInsert(['key' => 'fav_icon'], [
            'value' => $image_name
        ]);

         DB::table('settings')->updateOrInsert(['key' => 'website_title'], 
         ['value' => $request['website_title'], 'lang'=> $lang ]
        );

        DB::table('settings')->updateOrInsert(['key' => 'base_color'], [
            'value' => $request['base_color'] , 'lang'=> $lang]
        );
        
       
        DB::table('settings')->updateOrInsert(['key' => 'site_logo'], [
            'value' => $request['site_logo']
        ]);
        
        DB::table('settings')->updateOrInsert(['key' => 'fav_icon'], [
            'value' => $request['fav_icon']
        ]);
        
        DB::table('settings')->updateOrInsert(['key' => 'phone_number'], [
            'value' => $request['phone_number']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'email'], [
            'value' => $request['email']
        ]);
        DB::table('settings')->updateOrInsert(['key' => 'address'], [
            'value' => $request['address']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'footer_text'], [
            'value' => $request['footer_text']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'copyright_text'], [
            'value' => $request['copyright_text']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'meta_keywords'], [
            'value' => $request['meta_keywords']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'meta_description'], [
            'value' => $request['meta_description']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'social_facebook'], [
            'value' => $request['social_facebook']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'social_twitter'], [
            'value' => $request['social_twitter']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'social_instagram'], [
            'value' => $request['social_instagram']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'social_linkedin'], [
            'value' => $request['social_linkedin']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'social_whatsapp'], [
            'value' => $request['social_whatsapp']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'head_tags'], [
            'value' => $request['head_tags']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'body_tags'], [
            'value' => $request['body_tags']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'announcement'], [
            'value' => $request['announcement']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'announcement_delay'], [
            'value' => $request['announcement_delay']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'cookie_alert_text'], [
            'value' => $request['cookie_alert_text']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'is_preloader'], [
            'value' => $request['is_preloader']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'preloader_icon'], [
            'value' => $request['preloader_icon']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'preloader_bg_color'], [
            'value' => $request['preloader_bg_color']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'is_whatsapp'], [
            'value' => $request['is_whatsapp']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'is_cooki_alert'], [
            'value' => $request['is_cooki_alert']
        ]);
        
           return back();
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