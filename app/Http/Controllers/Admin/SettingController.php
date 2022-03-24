<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Models\Language;
use Artisan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExtraVisibility;
use App\Models\Seo;
use App\Models\Visibility;

class SettingController extends Controller
{
   public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }

    public function basicinfo(Request $request){
        $lang = Language::where('code', $request->language)->first()->id;
        $basicinfo = Setting::where('language_id', $lang)->first();

        return view('admin.settings.basicinfo', compact('basicinfo'));
    }


    // Update SEO Information
    public function seoinfo(Request $request){
      $lang = Language::where('code', $request->language)->first()->id;
      $seo = Setting::where('language_id', $lang)->first();
       return view('admin.settings.seo', compact('seo'));
    }

    public function updateSeoinfo(Request $request, $id){
      
      $seo = Seo::where('language_id', $id)->first();

      $seo->meta_keywords = $request->meta_keywords;
      $seo->meta_description = $request->meta_description;

	  
      $seo->about_meta_key = $request->about_meta_key;
      $seo->service_meta_key = $request->service_meta_key;
      $seo->portfolio_meta_key = $request->portfolio_meta_key;
      $seo->package_meta_key = $request->package_meta_key;
      $seo->team_meta_key = $request->team_meta_key;
      $seo->faq_meta_key = $request->faq_meta_key;
      $seo->gallery_meta_key = $request->gallery_meta_key;
      $seo->career_meta_key = $request->career_meta_key;
      $seo->blog_meta_key = $request->blog_meta_key;
      $seo->product_meta_key = $request->product_meta_key;
      $seo->contact_meta_key = $request->contact_meta_key;
      $seo->quot_meta_key = $request->quot_meta_key;

      $seo->about_meta_desc = $request->about_meta_desc;
      $seo->service_meta_desc = $request->service_meta_desc;
      $seo->portfolio_meta_desc = $request->portfolio_meta_desc;
      $seo->package_meta_desc = $request->package_meta_desc;
      $seo->team_meta_desc = $request->team_meta_desc;
      $seo->faq_meta_desc = $request->faq_meta_desc;
      $seo->gallery_meta_desc = $request->gallery_meta_desc;
      $seo->career_meta_desc = $request->career_meta_desc;
      $seo->blog_meta_desc = $request->blog_meta_desc;
      $seo->product_meta_desc = $request->product_meta_desc;
      $seo->contact_meta_desc = $request->contact_meta_desc;
      $seo->quot_meta_desc = $request->quot_meta_desc;

      $seo->save();

      $notification = array(
         'messege' => 'SEO Info Updated Successfully!',
         'alert' => 'success'
     );
     return redirect(route('admin.seoinfo').'?language='.$this->lang->code)->with('notification', $notification);

   }

   // Update General Settings
   public function gsettings(){
      return view('admin.settings.gsettings');
   }

   // Update Scripts
   public function scripts(){
      return view('admin.settings.scripts');
   }

   public function updateScripts(Request $request){

    

      $scriptsettings = Setting::first();

      $visibility = Visibility::first();


      $scriptsettings->disqus = $request->disqus;
      $scriptsettings->tawk_to = $request->tawk_to;
      $scriptsettings->google_analytics = $request->google_analytics;
      $scriptsettings->messenger = $request->messenger;
      $scriptsettings->google_recaptcha_site_key = $request->google_recaptcha_site_key;
      $scriptsettings->google_recaptcha_secret_key = $request->google_recaptcha_secret_key;

      if($request->is_google_analytics == 'on'){
         $visibility->is_google_analytics = 1;
      }else{
         $visibility->is_google_analytics = 0;
      }

      if($request->is_messenger == 'on'){
         $visibility->is_messenger = 1;
      }else{
         $visibility->is_messenger = 0;
      }

      $visibility->save();
      $scriptsettings->save();

      $notification = array(
         'messege' => 'Scripts Updated Successfully!',
         'alert' => 'success'
     );
     return redirect()->back()->with('notification', $notification);
     
   }

   public function updateBasicinfo(Request $request, $id){

   
      $request->validate([
         'website_title' => 'required|max:250',
         'base_color' => 'required',
         'gcolor1' => 'required',
         'gcolor2' => 'required',
         'gcolor3' => 'required',
         'header_logo' => 'mimes:jpeg,jpg,png',
         'fav_icon' => 'mimes:jpeg,jpg,png',
         'breadcrumb_image' => 'mimes:jpeg,jpg,png'
       ]);
  
	  
  
      $basicinfo = Setting::where('language_id', $id)->first();


      if($request->hasFile('header_logo')){
         @unlink('assets/front/img/'. $basicinfo->header_logo);
         $file = $request->file('header_logo');
         $extension = $file->getClientOriginalExtension();
         $header_logo = 'header_logo_'.time().rand().'.'.$extension;
         $file->move('assets/front/img/', $header_logo);
         $basicinfo->header_logo = $header_logo;
     }
     
      if($request->hasFile('fav_icon')){
         @unlink('assets/front/img/'. $basicinfo->fav_icon);
         $file = $request->file('fav_icon');
         $extension = $file->getClientOriginalExtension();
         $fav_icon = 'fav_icon_'.time().rand().'.'.$extension;
         $file->move('assets/front/img/', $fav_icon);
         $basicinfo->fav_icon = $fav_icon;
     }

      if($request->hasFile('breadcrumb_image')){
         @unlink('assets/front/img/'. $basicinfo->breadcrumb_image);
         $file = $request->file('breadcrumb_image');
         $extension = $file->getClientOriginalExtension();
         $breadcrumb_image = 'breadcrumb_image_'.'.'.$extension;
         $file->move('assets/front/img/', $breadcrumb_image);
         $basicinfo->breadcrumb_image = $breadcrumb_image;
     }

       $basicinfo->website_title = $request->website_title;
       $basicinfo->currency_direction = $request->currency_direction;

       $new_base_color = ltrim($request->base_color, '#');
       $new_g_color1 = ltrim($request->gcolor1, '#');
       $new_g_color2 = ltrim($request->gcolor2, '#');
       $new_g_color3 = ltrim($request->gcolor3, '#');

       $basicinfo->base_color = $new_base_color;
       $basicinfo->gcolor1 = $new_g_color1;
       $basicinfo->gcolor2 = $new_g_color2;
       $basicinfo->gcolor3 = $new_g_color3;

	   if($request->is_dark == 'on'){
			$basicinfo->is_dark = 1;
		}else{
			$basicinfo->is_dark = 0;
		}


       $basicinfo->save();


      $notification = array(
            'messege' => 'Basic Info Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.basicinfo').'?language='.$this->lang->code)->with('notification', $notification);
   }

   // Page Visibility 
   public function pagevisibility(){
      return view('admin.settings.page-visibility');
   }
   public function innerpage_visibility(){
      return view('admin.settings.pv.innerpage');
   }
   public function others_visibility(){
      return view('admin.settings.pv.others');
   }
   public function pvh1(){
      return view('admin.settings.pv.pvh1');
   }
   public function pvh2(){
      return view('admin.settings.pv.pvh2');
   }
   public function pvh3(){
      return view('admin.settings.pv.pvh3');
   }
   public function pvh4(){
      return view('admin.settings.pv.pvh4');
   }
   public function pvh5(){
      return view('admin.settings.pv.pvh5');
   }
   public function pvh6(){
      return view('admin.settings.pv.pvh6');
   }
   public function pvh7(){
      return view('admin.settings.pv.pvh7');
   }
   public function pvh8(){
      return view('admin.settings.pv.pvh8');
   }
   public function pvh9(){
      return view('admin.settings.pv.pvh9');
   }

   public function updatepagevisibilityh1(Request $request){

      $pagevisibility = Visibility::first();


	   if($request->is_t1_slider_section == 'on'){
		   $pagevisibility->is_t1_slider_section = 1;
	   }else{
		   $pagevisibility->is_t1_slider_section = 0;
      }

	   if($request->is_t1_who_we_are_section == 'on'){
		   $pagevisibility->is_t1_who_we_are_section = 1;
	   }else{
		   $pagevisibility->is_t1_who_we_are_section = 0;
      }

	   if($request->is_t1_intro_video_section == 'on'){
		   $pagevisibility->is_t1_intro_video_section = 1;
	   }else{
		   $pagevisibility->is_t1_intro_video_section = 0;
      }

	   if($request->is_t1_service_section == 'on'){
		   $pagevisibility->is_t1_service_section = 1;
	   }else{
		   $pagevisibility->is_t1_service_section = 0;
      }

	   if($request->is_t1_why_choose_us_section == 'on'){
		   $pagevisibility->is_t1_why_choose_us_section = 1;
	   }else{
		   $pagevisibility->is_t1_why_choose_us_section = 0;
      }

	   if($request->is_t1_portfolio_section == 'on'){
		   $pagevisibility->is_t1_portfolio_section = 1;
	   }else{
		   $pagevisibility->is_t1_portfolio_section = 0;
      }

	   if($request->is_t1_testimonial_section == 'on'){
		   $pagevisibility->is_t1_testimonial_section = 1;
	   }else{
		   $pagevisibility->is_t1_testimonial_section = 0;
      }

	   if($request->is_t1_team_section == 'on'){
		   $pagevisibility->is_t1_team_section = 1;
	   }else{
		   $pagevisibility->is_t1_team_section = 0;
      }

	   if($request->is_t1_contact_section == 'on'){
		   $pagevisibility->is_t1_contact_section = 1;
	   }else{
		   $pagevisibility->is_t1_contact_section = 0;
      }

	   if($request->is_t1_faq_counter_section == 'on'){
		   $pagevisibility->is_t1_faq_counter_section = 1;
	   }else{
		   $pagevisibility->is_t1_faq_counter_section = 0;
      }

	   if($request->is_t1_meet_us_section == 'on'){
		   $pagevisibility->is_t1_meet_us_section = 1;
	   }else{
		   $pagevisibility->is_t1_meet_us_section = 0;
      }

	   if($request->is_t1_blog_section == 'on'){
		   $pagevisibility->is_t1_blog_section = 1;
	   }else{
		   $pagevisibility->is_t1_blog_section = 0;
      }

	   if($request->is_t1_clint_section == 'on'){
		   $pagevisibility->is_t1_clint_section = 1;
	   }else{
		   $pagevisibility->is_t1_clint_section = 0;
      }


      $pagevisibility->save();

      $notification = array(
         'messege' => 'Updated Successfully!',
         'alert' => 'success'
     );
     return redirect()->back()->with('notification', $notification);
   }

   public function updatepagevisibilityh2(Request $request){

      $pagevisibility = Visibility::first();


	   if($request->is_t2_hero_section == 'on'){
		   $pagevisibility->is_t2_hero_section = 1;
	   }else{
		   $pagevisibility->is_t2_hero_section = 0;
      }

	   if($request->is_t2_about_section == 'on'){
		   $pagevisibility->is_t2_about_section = 1;
	   }else{
		   $pagevisibility->is_t2_about_section = 0;
      }

	   if($request->is_t2_service_section == 'on'){
		   $pagevisibility->is_t2_service_section = 1;
	   }else{
		   $pagevisibility->is_t2_service_section = 0;
      }

	   if($request->is_t2_intro_video_section == 'on'){
		   $pagevisibility->is_t2_intro_video_section = 1;
	   }else{
		   $pagevisibility->is_t2_intro_video_section = 0;
      }

	   if($request->is_t2_team_section == 'on'){
		   $pagevisibility->is_t2_team_section = 1;
	   }else{
		   $pagevisibility->is_t2_team_section = 0;
      }

	   if($request->is_t2_counter_section == 'on'){
		   $pagevisibility->is_t2_counter_section = 1;
	   }else{
		   $pagevisibility->is_t2_counter_section = 0;
      }

	   if($request->is_t2_testimonial_section == 'on'){
		   $pagevisibility->is_t2_testimonial_section = 1;
	   }else{
		   $pagevisibility->is_t2_testimonial_section = 0;
      }

	   if($request->is_t2_contact_section == 'on'){
		   $pagevisibility->is_t2_contact_section = 1;
	   }else{
		   $pagevisibility->is_t2_contact_section = 0;
      }

	   if($request->is_t2_faq_section == 'on'){
		   $pagevisibility->is_t2_faq_section = 1;
	   }else{
		   $pagevisibility->is_t2_faq_section = 0;
      }

	   if($request->is_t2_quote_section == 'on'){
		   $pagevisibility->is_t2_quote_section = 1;
	   }else{
		   $pagevisibility->is_t2_quote_section = 0;
      }

	   if($request->is_t2_news_section == 'on'){
		   $pagevisibility->is_t2_news_section = 1;
	   }else{
		   $pagevisibility->is_t2_news_section = 0;
      }

	   if($request->is_t2_client_section == 'on'){
		   $pagevisibility->is_t2_client_section = 1;
	   }else{
		   $pagevisibility->is_t2_client_section = 0;
      }


      
      $pagevisibility->save();

      $notification = array(
         'messege' => 'Updated Successfully!',
         'alert' => 'success'
     );
     return redirect()->back()->with('notification', $notification);
   }

   public function updatepagevisibilityh3(Request $request){

      $pagevisibility = Visibility::first();

	   if($request->is_t3_hero_section == 'on'){
		   $pagevisibility->is_t3_hero_section = 1;
	   }else{
		   $pagevisibility->is_t3_hero_section = 0;
      }

	   if($request->is_t3_service_section == 'on'){
		   $pagevisibility->is_t3_service_section = 1;
	   }else{
		   $pagevisibility->is_t3_service_section = 0;
      }

	   if($request->is_t3_portfolio_section == 'on'){
		   $pagevisibility->is_t3_portfolio_section = 1;
	   }else{
		   $pagevisibility->is_t3_portfolio_section = 0;
      }

	   if($request->is_t3_testimonial_section == 'on'){
		   $pagevisibility->is_t3_testimonial_section = 1;
	   }else{
		   $pagevisibility->is_t3_testimonial_section = 0;
      }

	   if($request->is_t3_faq_section == 'on'){
		   $pagevisibility->is_t3_faq_section = 1;
	   }else{
		   $pagevisibility->is_t3_faq_section = 0;
      }

	   if($request->is_t3_team_section == 'on'){
		   $pagevisibility->is_t3_team_section = 1;
	   }else{
		   $pagevisibility->is_t3_team_section = 0;
      }

	   if($request->is_t3_meet_us_section == 'on'){
		   $pagevisibility->is_t3_meet_us_section = 1;
	   }else{
		   $pagevisibility->is_t3_meet_us_section = 0;
      }

	   if($request->is_t3_news_section == 'on'){
		   $pagevisibility->is_t3_news_section = 1;
	   }else{
		   $pagevisibility->is_t3_news_section = 0;
      }

	   if($request->is_t3_client_section == 'on'){
		   $pagevisibility->is_t3_client_section = 1;
	   }else{
		   $pagevisibility->is_t3_client_section = 0;
      }

      
      $pagevisibility->save();

      $notification = array(
         'messege' => 'Updated Successfully!',
         'alert' => 'success'
     );
     return redirect()->back()->with('notification', $notification);
   }


   public function updatepagevisibilityh4(Request $request){

      $pagevisibility = Visibility::first();



	   if($request->is_t4_hero_section == 'on'){
		   $pagevisibility->is_t4_hero_section = 1;
	   }else{
		   $pagevisibility->is_t4_hero_section = 0;
      }

	   if($request->is_t4_client_section == 'on'){
		   $pagevisibility->is_t4_client_section = 1;
	   }else{
		   $pagevisibility->is_t4_client_section = 0;
      }

	   if($request->is_t4_about_section == 'on'){
		   $pagevisibility->is_t4_about_section = 1;
	   }else{
		   $pagevisibility->is_t4_about_section = 0;
      }

	   if($request->is_t4_feature_section == 'on'){
		   $pagevisibility->is_t4_feature_section = 1;
	   }else{
		   $pagevisibility->is_t4_feature_section = 0;
      }

	   if($request->is_t4_who_we_are_section == 'on'){
		   $pagevisibility->is_t4_who_we_are_section = 1;
	   }else{
		   $pagevisibility->is_t4_who_we_are_section = 0;
      }

	   if($request->is_t4_intro_video_section == 'on'){
		   $pagevisibility->is_t4_intro_video_section = 1;
	   }else{
		   $pagevisibility->is_t4_intro_video_section = 0;
      }

	   if($request->is_t4_portfolio_section == 'on'){
		   $pagevisibility->is_t4_portfolio_section = 1;
	   }else{
		   $pagevisibility->is_t4_portfolio_section = 0;
      }

	   if($request->is_t4_counter_section == 'on'){
		   $pagevisibility->is_t4_counter_section = 1;
	   }else{
		   $pagevisibility->is_t4_counter_section = 0;
      }

	   if($request->is_t4_testmonial_section == 'on'){
		   $pagevisibility->is_t4_testmonial_section = 1;
	   }else{
		   $pagevisibility->is_t4_testmonial_section = 0;
      }

	   if($request->is_t4_faq_section == 'on'){
		   $pagevisibility->is_t4_faq_section = 1;
	   }else{
		   $pagevisibility->is_t4_faq_section = 0;
      }

	   if($request->is_t4_contact_section == 'on'){
		   $pagevisibility->is_t4_contact_section = 1;
	   }else{
		   $pagevisibility->is_t4_contact_section = 0;
      }

	 
      
      $pagevisibility->save();

      $notification = array(
         'messege' => 'Updated Successfully!',
         'alert' => 'success'
     );
     return redirect()->back()->with('notification', $notification);
   }

   public function updatepagevisibilityh5(Request $request){

      $pagevisibility = Visibility::first();



	   if($request->is_t5_slider_section == 'on'){
		   $pagevisibility->is_t5_slider_section = 1;
	   }else{
		   $pagevisibility->is_t5_slider_section = 0;
      }
	   if($request->is_t5_about_section == 'on'){
		   $pagevisibility->is_t5_about_section = 1;
	   }else{
		   $pagevisibility->is_t5_about_section = 0;
      }
	   if($request->is_t5_who_er_are_section == 'on'){
		   $pagevisibility->is_t5_who_er_are_section = 1;
	   }else{
		   $pagevisibility->is_t5_who_er_are_section = 0;
      }
	   if($request->is_t5_service_section == 'on'){
		   $pagevisibility->is_t5_service_section = 1;
	   }else{
		   $pagevisibility->is_t5_service_section = 0;
      }
	   if($request->is_t5_project_section == 'on'){
		   $pagevisibility->is_t5_project_section = 1;
	   }else{
		   $pagevisibility->is_t5_project_section = 0;
      }
	   if($request->is_t5_team_section == 'on'){
		   $pagevisibility->is_t5_team_section = 1;
	   }else{
		   $pagevisibility->is_t5_team_section = 0;
      }
	   if($request->is_t5_counter_section == 'on'){
		   $pagevisibility->is_t5_counter_section = 1;
	   }else{
		   $pagevisibility->is_t5_counter_section = 0;
      }
	   if($request->is_t5_testimonial_section == 'on'){
		   $pagevisibility->is_t5_testimonial_section = 1;
	   }else{
		   $pagevisibility->is_t5_testimonial_section = 0;
      }
	   if($request->is_t5_meetus_section == 'on'){
		   $pagevisibility->is_t5_meetus_section = 1;
	   }else{
		   $pagevisibility->is_t5_meetus_section = 0;
      }
	   if($request->is_t5_blog_section == 'on'){
		   $pagevisibility->is_t5_blog_section = 1;
	   }else{
		   $pagevisibility->is_t5_blog_section = 0;
      }
	   if($request->is_t5_client_section == 'on'){
		   $pagevisibility->is_t5_client_section = 1;
	   }else{
		   $pagevisibility->is_t5_client_section = 0;
      }


      
      $pagevisibility->save();

      $notification = array(
         'messege' => 'Updated Successfully!',
         'alert' => 'success'
     );
     return redirect()->back()->with('notification', $notification);
   }

   
   public function updatepagevisibilityh6(Request $request){

	$pagevisibility = Visibility::first();

	 if($request->is_t6_slider_section == 'on'){
		 $pagevisibility->is_t6_slider_section = 1;
	 }else{
		 $pagevisibility->is_t6_slider_section = 0;
	}


	 if($request->is_t6_client_section == 'on'){
		 $pagevisibility->is_t6_client_section = 1;
	 }else{
		 $pagevisibility->is_t6_client_section = 0;
	}


	 if($request->is_t6_who_we_are_section == 'on'){
		 $pagevisibility->is_t6_who_we_are_section = 1;
	 }else{
		 $pagevisibility->is_t6_who_we_are_section = 0;
	}


	 if($request->is_t6_service_section == 'on'){
		 $pagevisibility->is_t6_service_section = 1;
	 }else{
		 $pagevisibility->is_t6_service_section = 0;
	}


	 if($request->is_t6_project_section == 'on'){
		 $pagevisibility->is_t6_project_section = 1;
	 }else{
		 $pagevisibility->is_t6_project_section = 0;
	}


	 if($request->is_t6_team_section == 'on'){
		 $pagevisibility->is_t6_team_section = 1;
	 }else{
		 $pagevisibility->is_t6_team_section = 0;
	}


	 if($request->is_t6_testimonial_section == 'on'){
		 $pagevisibility->is_t6_testimonial_section = 1;
	 }else{
		 $pagevisibility->is_t6_testimonial_section = 0;
	}


	 if($request->is_t6_faq_counter_section == 'on'){
		 $pagevisibility->is_t6_faq_counter_section = 1;
	 }else{
		 $pagevisibility->is_t6_faq_counter_section = 0;
	}


	 if($request->is_t6_meetus_section == 'on'){
		 $pagevisibility->is_t6_meetus_section = 1;
	 }else{
		 $pagevisibility->is_t6_meetus_section = 0;
	}


	 if($request->is_t6_blog_section == 'on'){
		 $pagevisibility->is_t6_blog_section = 1;
	 }else{
		 $pagevisibility->is_t6_blog_section = 0;
	}


	 if($request->is_t6_map_section == 'on'){
		 $pagevisibility->is_t6_map_section = 1;
	 }else{
		 $pagevisibility->is_t6_map_section = 0;
	}

		
		$pagevisibility->save();

		$notification = array(
		'messege' => 'Updated Successfully!',
		'alert' => 'success'
	);
   	return redirect()->back()->with('notification', $notification);
}


public function updatepagevisibilityh7(Request $request){

	$pagevisibility = ExtraVisibility::first();

	 if($request->is_t7_slider_section == 'on'){
		 $pagevisibility->is_t7_slider_section = 1;
	 }else{
		 $pagevisibility->is_t7_slider_section = 0;
	}


	 if($request->is_t7_video_section == 'on'){
		 $pagevisibility->is_t7_video_section = 1;
	 }else{
		 $pagevisibility->is_t7_video_section = 0;
	}


	 if($request->is_t7_service_section == 'on'){
		 $pagevisibility->is_t7_service_section = 1;
	 }else{
		 $pagevisibility->is_t7_service_section = 0;
	}


	 if($request->is_t7_portfolio_section == 'on'){
		 $pagevisibility->is_t7_portfolio_section = 1;
	 }else{
		 $pagevisibility->is_t7_portfolio_section = 0;
	}


	 if($request->is_t7_team_section == 'on'){
		 $pagevisibility->is_t7_team_section = 1;
	 }else{
		 $pagevisibility->is_t7_team_section = 0;
	}


	 if($request->is_t7_testimonial_section == 'on'){
		 $pagevisibility->is_t7_testimonial_section = 1;
	 }else{
		 $pagevisibility->is_t7_testimonial_section = 0;
	}


	 if($request->is_t7_callaction_section == 'on'){
		 $pagevisibility->is_t7_callaction_section = 1;
	 }else{
		 $pagevisibility->is_t7_callaction_section = 0;
	}


	 if($request->is_t7_blog_section == 'on'){
		 $pagevisibility->is_t7_blog_section = 1;
	 }else{
		 $pagevisibility->is_t7_blog_section = 0;
	}


	 if($request->is_t7_brand_section == 'on'){
		 $pagevisibility->is_t7_brand_section = 1;
	 }else{
		 $pagevisibility->is_t7_brand_section = 0;
	}

		
		$pagevisibility->save();

		$notification = array(
		'messege' => 'Updated Successfully!',
		'alert' => 'success'
	);
   	return redirect()->back()->with('notification', $notification);
}


public function updatepagevisibilityh8(Request $request){

	$pagevisibility = ExtraVisibility::first();

	 if($request->is_t8_hero_section == 'on'){
		 $pagevisibility->is_t8_hero_section = 1;
	 }else{
		 $pagevisibility->is_t8_hero_section = 0;
	}


	 if($request->is_t8_about_section == 'on'){
		 $pagevisibility->is_t8_about_section = 1;
	 }else{
		 $pagevisibility->is_t8_about_section = 0;
	}


	 if($request->is_t8_video_section == 'on'){
		 $pagevisibility->is_t8_video_section = 1;
	 }else{
		 $pagevisibility->is_t8_video_section = 0;
	}


	 if($request->is_t8_service_section == 'on'){
		 $pagevisibility->is_t8_service_section = 1;
	 }else{
		 $pagevisibility->is_t8_service_section = 0;
	}


	 if($request->is_t8_callaction_section == 'on'){
		 $pagevisibility->is_t8_callaction_section = 1;
	 }else{
		 $pagevisibility->is_t8_callaction_section = 0;
	}


	 if($request->is_t8_portfolio_section == 'on'){
		 $pagevisibility->is_t8_portfolio_section = 1;
	 }else{
		 $pagevisibility->is_t8_portfolio_section = 0;
	}


	 if($request->is_t8_testimonial_section == 'on'){
		 $pagevisibility->is_t8_testimonial_section = 1;
	 }else{
		 $pagevisibility->is_t8_testimonial_section = 0;
	}


	 if($request->is_t8_team_section == 'on'){
		 $pagevisibility->is_t8_team_section = 1;
	 }else{
		 $pagevisibility->is_t8_team_section = 0;
	}


	 if($request->is_t8_blog_section == 'on'){
		 $pagevisibility->is_t8_blog_section = 1;
	 }else{
		 $pagevisibility->is_t8_blog_section = 0;
	}


	 if($request->is_t8_brand_section == 'on'){
		 $pagevisibility->is_t8_brand_section = 1;
	 }else{
		 $pagevisibility->is_t8_brand_section = 0;
	}

		
		$pagevisibility->save();

		$notification = array(
		'messege' => 'Updated Successfully!',
		'alert' => 'success'
	);
   	return redirect()->back()->with('notification', $notification);
}


public function updatepagevisibilityh9(Request $request){

	$pagevisibility = ExtraVisibility::first();

	 if($request->is_t9_slider_section == 'on'){
		 $pagevisibility->is_t9_slider_section = 1;
	 }else{
		 $pagevisibility->is_t9_slider_section = 0;
	}


	 if($request->is_t9_banner_section == 'on'){
		 $pagevisibility->is_t9_banner_section = 1;
	 }else{
		 $pagevisibility->is_t9_banner_section = 0;
	}


	 if($request->is_t9_popularcategory_section == 'on'){
		 $pagevisibility->is_t9_popularcategory_section = 1;
	 }else{
		 $pagevisibility->is_t9_popularcategory_section = 0;
	}


	 if($request->is_t9_newproduct_section == 'on'){
		 $pagevisibility->is_t9_newproduct_section = 1;
	 }else{
		 $pagevisibility->is_t9_newproduct_section = 0;
	}


	 if($request->is_t9_featureproduct_section == 'on'){
		 $pagevisibility->is_t9_featureproduct_section = 1;
	 }else{
		 $pagevisibility->is_t9_featureproduct_section = 0;
	}


		
		$pagevisibility->save();

		$notification = array(
		'messege' => 'Updated Successfully!',
		'alert' => 'success'
	);
   	return redirect()->back()->with('notification', $notification);
}


   public function update_innerpage_visibility(Request $request){

      $pagevisibility = Visibility::first();

	   if($request->is_quote_page == 'on'){
		   $pagevisibility->is_quote_page = 1;
	   }else{
		   $pagevisibility->is_quote_page = 0;
      }
	
	   if($request->is_about_about == 'on'){
		   $pagevisibility->is_about_about = 1;
	   }else{
		   $pagevisibility->is_about_about = 0;
      }

	   if($request->is_about_w_w_a == 'on'){
		   $pagevisibility->is_about_w_w_a = 1;
	   }else{
		   $pagevisibility->is_about_w_w_a = 0;
      }

	   if($request->is_about_choose_us == 'on'){
		   $pagevisibility->is_about_choose_us = 1;
	   }else{
		   $pagevisibility->is_about_choose_us = 0;
      }

	   if($request->is_about_history == 'on'){
		   $pagevisibility->is_about_history = 1;
	   }else{
		   $pagevisibility->is_about_history = 0;
      }

	   if($request->is_shop == 'on'){
		   $pagevisibility->is_shop = 1;
	   }else{
		   $pagevisibility->is_shop = 0;
      }
	   if($request->is_user_system == 'on'){
		   $pagevisibility->is_user_system = 1;
	   }else{
		   $pagevisibility->is_user_system = 0;
      }

	 
      $pagevisibility->save();

      $notification = array(
         'messege' => 'Updated Successfully!',
         'alert' => 'success'
     );
     return redirect()->back()->with('notification', $notification);
   }

   public function update_others_visibility(Request $request){

      $pagevisibility = Visibility::first();

		if($request->is_blog_share_links == 'on'){
			$pagevisibility->is_blog_share_links = 1;
		}else{
			$pagevisibility->is_blog_share_links = 0;
		}
		if($request->is_shop_share_links == 'on'){
			$pagevisibility->is_shop_share_links = 1;
		}else{
			$pagevisibility->is_shop_share_links = 0;
		}

		if($request->is_cooki_alert == 'on'){
			$pagevisibility->is_cooki_alert = 1;
		}else{
			$pagevisibility->is_cooki_alert = 0;
		}
	   if($request->is_whatsapp == 'on'){
		   $pagevisibility->is_whatsapp = 1;
	   }else{
		   $pagevisibility->is_whatsapp = 0;
      }

	   if($request->is_call_button == 'on'){
		   $pagevisibility->is_call_button = 1;
	   }else{
		   $pagevisibility->is_call_button = 0;
      }

      
      $pagevisibility->save();

      $notification = array(
         'messege' => 'Updated Successfully!',
         'alert' => 'success'
     );
     return redirect()->back()->with('notification', $notification);
   }

   // Custom CSS
   public function custom_css()
   {
       $custom_css = '/* Write Custom Css Here */';
       if (file_exists('assets/front/css/dynamic-css.css')) {
           $custom_css = file_get_contents('assets/front/css/dynamic-css.css');
       }
       return view('admin.settings.custom-css')->with(['custom_css' => $custom_css]);
   }

   public function custom_css_update(Request $request)
   {
       file_put_contents('assets/front/css/dynamic-css.css', $request->custom_css_area);

       $notification = array(
         'messege' => 'Custom Style Added Success!',
         'alert' => 'success'
     );
     return redirect()->back()->with('notification', $notification);
   }

   public function slider_overlay(){
	return view('admin.home.slider');
   }
   public function slider_o_update(Request $request){
	   $setting = Setting::find(1);
	   $setting->slider_overlay = $request->slider_overlay;
	   $setting->save();
	   return redirect()->back();
   }
   public function maintanance(){
	return view('admin.settings.maintanance');
   }

   public function update_maintanance(Request $request){

	$request->validate([
		'maintainance_text' => 'required',
		'maintainance_image' => 'mimes:jpeg,jpg,png',
	  ]);

	$setting = Setting::first();
	$visibility = Visibility::first();

	if($request->hasFile('maintainance_image')){
		@unlink('assets/front/img/'. $setting->maintainance_image);
		$file = $request->file('maintainance_image');
		$extension = $file->getClientOriginalExtension();
		$maintainance_image = time().rand().'.'.$extension;
		$file->move('assets/front/img/', $maintainance_image);
		$setting->maintainance_image = $maintainance_image;
	}

	$setting->maintainance_text = $request->maintainance_text;

	if($request->is_maintainance_mode == 'on'){
		$visibility->is_maintainance_mode = 1;
	}else{
		$visibility->is_maintainance_mode = 0;
    }

	$setting->save();
	$visibility->save();

	if ($request->is_maintainance_mode == 'on') {
		Artisan::call('down');
	} else {
		@unlink('core/storage/framework/down');
	}
	
	$notification = array(
		'messege' => 'Maintainance Mode Updated successfully!',
		'alert' => 'success'
	);
	return redirect()->back()->with('notification', $notification);

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
	 $visibility = Visibility::first();

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
		$visibility->is_announcement = 1;
	}else{
		$visibility->is_announcement = 0;
    }

	$st->save();
	$visibility->save();


	 $notification = array(
		   'messege' => 'Announcement Info Updated successfully!',
		   'alert' => 'success'
	   );
	   return redirect(route('admin.announcement.index').'?language='.$this->lang->code)->with('notification', $notification);
   }

   // Preloader
   public function preloader(Request $request)
   {
	
	return view('admin.settings.preloader');
   }

   public function update_preloader(Request $request){
	   


	$request->validate([
		'preloader_bg_color' => 'required',
		'preloader_icon' => 'mimes:jpeg,jpg,png,gif',
	  ]);

	  

	$setting = Setting::first();
	$visibility = Visibility::first();

	if($request->hasFile('preloader_icon')){
		@unlink('assets/front/img/'. $setting->preloader_icon);
		$file = $request->file('preloader_icon');
		$extension = $file->getClientOriginalExtension();
		$preloader_icon = time().rand().'.'.$extension;
		$file->move('assets/front/img/', $preloader_icon);
		$setting->preloader_icon = $preloader_icon;
	}

	$setting->preloader_bg_color = $request->preloader_bg_color;

	if($request->is_preloader == 'on'){
		$visibility->is_preloader = 1;
	}else{
		$visibility->is_preloader = 0;
    }

	$visibility->save();
	$setting->save();


	$notification = array(
		'messege' => 'Preloader Updated successfully!',
		'alert' => 'success'
	);
	return redirect()->back()->with('notification', $notification);
   }


   public function cookiealert(Request $request)
   {
      $lang = Language::where('code', $request->language)->first()->id;
     
      $data['cookie'] = Setting::where('language_id', $lang)->first();

       return view('admin.settings.cookie', $data);
   }

   public function updatecookie(Request $request, $langid)
   {
       $request->validate([
           'cookie_alert_text' => 'required'
       ]);

       $be = Setting::where('language_id', $langid)->firstOrFail();
       $be->cookie_alert_text = $request->cookie_alert_text;
       $be->save();

       $notification = array(
         'messege' => 'Cookie alert updated successfully!',
         'alert' => 'success'
     );
     return redirect()->back()->with('notification', $notification);
   }

}