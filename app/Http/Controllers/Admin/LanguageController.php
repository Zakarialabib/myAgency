<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Setting;
use App\Models\Language;
use App\Models\Sectiontitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Seo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class LanguageController extends Controller
{
  public function index($lang = false)
  {
    $page_title = 'Language Manager';
    $empty_message = 'No language has been added.';
    $languages = Language::orderByDesc('is_default')->get();
    $path = 'assets/images/lang';
    $size = '64x64';

    return view('admin.language.index', compact('page_title', 'empty_message', 'languages', 'path', 'size'));
  }

  public function langUpdate(Request $request, $id)
  {
    $lang = Language::find($id);
    $content = json_encode($request->keys);

    if ($content === 'null') {
      $notify[] = ['error', 'At Least One Field Should Be Fill-up'];
      return back()->withNotify($notify);
    }
    file_put_contents(resource_path('lang/') . $lang->code . '.json', $content);


    $notification = array(
      'messege' => 'Update Successfully',
      'alert' => 'success'
    );
    return redirect()->back()->with('notification', $notification);
  }

  public function edit($id)
  {
    $la = Language::find($id);
    $page_title = "Update " . $la->name . " Keywords";
    $json = file_get_contents(resource_path('lang/') . $la->code . '.json');
    $list_lang = Language::all();


    if (empty($json)) {
      $notify[] = ['error', 'File Not Found.'];
      return back()->with($notify);
    }
    $json = json_decode($json);

    return view('admin.language.edit_lang', compact('page_title', 'json', 'la', 'list_lang'));
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required'
    ]);

    $la = Language::findOrFail($id);



    if ($request->is_default) {
      Language::where('is_default', 1)->update([
        'is_default' => 0
      ]);
    }


    $la->update([
      'name' => $request->name,
      'direction' => $request->direction,
      'is_default' => $request->default ? 1 : 0,
    ]);


    $notification = array(
      'messege' => 'Update Successfully',
      'alert' => 'success'
    );
    return redirect()->back()->with('notification', $notification);
  }

  public function delete($id)
  {
    $la = Language::find($id);
    Helper::removeFile(resource_path('lang/') . $la->code . '.json');
    $la->delete();

    $bs = $la->setting;

    $menu = Menu::where('language_id', $la->id)->first();
    $menu->delete();

    if (!empty($bs)) {

      @unlink('assets/front/img/' . $bs->header_logo);

      @unlink('assets/front/img/' . $bs->footer_logo);

      @unlink('assets/front/img/' . $bs->fav_icon);

      @unlink('assets/front/img/' . $bs->breadcrumb_image);

      @unlink('assets/front/img/' . $bs->footer_bg_image);

      $bs->delete();
    }

    $sectiontitle = $la->sectiontitle;
    if (!empty($sectiontitle)) {

      @unlink('assets/front/img/' . $sectiontitle->video_image);

      @unlink('assets/front/img/' . $sectiontitle->video_image_right);

      @unlink('assets/front/img/' . $sectiontitle->video_image_left);

      @unlink('assets/front/img/' . $sectiontitle->video_bg_image);

      @unlink('assets/front/img/' . $sectiontitle->w_c_us_image1);

      @unlink('assets/front/img/' . $sectiontitle->w_c_us_image2);

      @unlink('assets/front/img/' . $sectiontitle->contact_section_bg_image);

      @unlink('assets/front/img/' . $sectiontitle->contact_form_image);

      @unlink('assets/front/img/' . $sectiontitle->faq_bg_image);

      @unlink('assets/front/img/' . $sectiontitle->faq_image1);

      @unlink('assets/front/img/' . $sectiontitle->faq_image2);

      @unlink('assets/front/img/' . $sectiontitle->hero_image);

      @unlink('assets/front/img/' . $sectiontitle->hero_bg_image);

      @unlink('assets/front/img/' . $sectiontitle->about_image);

      @unlink('assets/front/img/' . $sectiontitle->counter_bg_image);

      @unlink('assets/front/img/' . $sectiontitle->meeet_us_bg_image);

      $sectiontitle->delete();
    }

    // deleting packages for corresponding language
    if (!empty($la->packages)) {
      $la->packages()->delete();
    }

    // deleting pages for corresponding language
    if (!empty($la->daynamicpages)) {
      $la->daynamicpages()->delete();
    }

    // deleting sliders for corresponding language
    if (!empty($la->sliders)) {
      $sliders = $la->sliders;
      foreach ($sliders as $slider) {
        @unlink('assets/front/img/slider/' . $slider->image);
        $slider->delete();
      }
    }

    // deleting testimonials for corresponding language
    if (!empty($la->testimonials)) {
      $testimonials = $la->testimonials;
      foreach ($testimonials as $testimonial) {
        @unlink('assets/front/img/' . $testimonial->image);
        $testimonial->delete();
      }
    }

    // deleting members for corresponding language
    if (!empty($la->teams)) {
      $members = $la->teams;
      foreach ($members as $member) {
        @unlink('assets/front/img/team/' . $member->image);
        $member->delete();
      }
    }

    // deleting partners for corresponding language
    if (!empty($la->clients)) {
      $partners = $la->clients;
      foreach ($partners as $partner) {
        @unlink('assets/front/img/partners/' . $partner->image);
        $partner->delete();
      }
    }

    // deleting feature for corresponding language
    if (!empty($la->features)) {
      $features = $la->features;
      foreach ($features as $feature) {
        $feature->delete();
      }
    }

    // deleting portfolios for corresponding language
    if (!empty($la->portfolios)) {
      $portfolios = $la->portfolios;
      foreach ($portfolios as $portfolio) {
        @unlink('assets/front/img/portfolio/' . $portfolio->featured_image);

        // deleting slider images of the specific portfolio
        $pis = $portfolio->portfolio_images;
        if ($pis) {
          foreach ($pis as $pi) {
            @unlink('assets/front/img/portfolio/' . $pi->image);
            $pi->delete();
          }
        }

        $portfolio->delete();
      }
    }

    // deleting services for corresponding language
    if (!empty($la->services)) {
      $services = $la->services;
      foreach ($services as $service) {
        @unlink('assets/front/img/service/' . $service->image);
        $service->delete();
      }
    }

    // deleting services for corresponding language
    if (!empty($la->blogs)) {
      $blogs = $la->blogs;
      foreach ($blogs as $blog) {
        @unlink('assets/front/img/blog/' . $blog->image);
        $blog->delete();
      }
    }

    // deleting blog categories for corresponding language
    if (!empty($la->bcategories)) {
      $bcategories = $la->bcategories;
      foreach ($bcategories as $bcat) {
        $bcat->delete();
      }
    }

    // deleting packages for corresponding language
    if (!empty($la->counters)) {
      $la->counters()->delete();
    }

    // deleting useful links for corresponding language
    if (!empty($la->flinks)) {
      $la->flinks()->delete();
    }
    // deleting faqs for corresponding language
    if (!empty($la->faqs)) {
      $la->faqs()->delete();
    }

    // deleting why_selects for corresponding language
    if (!empty($la->why_selects)) {
      $la->why_selects()->delete();
    }

    // deleting history for corresponding language
    if (!empty($la->histories)) {
      $histories = $la->histories;
      foreach ($histories as $history) {
        @unlink('assets/front/img/history/' . $history->image);
        $history->delete();
      }
    }

    $la->delete();
    session()->forget('lang');

    $notification = array(
      'messege' => 'Language Delete Successfully',
      'alert' => 'success'
    );
    return redirect()->route('admin.language-manage')->with('notification', $notification);
  }

  public function storeLanguageJson(Request $request, $id)
  {
    $la = Language::find($id);
    $this->validate($request, [
      'key' => 'required',
      'value' => 'required'
    ]);

    $items = file_get_contents(resource_path('lang/') . $la->code . '.json');

    $reqKey = trim($request->key);

    if (array_key_exists($reqKey, json_decode($items, true))) {
      $notify[] = ['error', "`$reqKey` Already Exist"];
      return back()->withNotify($notify);
    } else {
      $newArr[$reqKey] = trim($request->value);
      $itemsss = json_decode($items, true);
      $result = array_merge($itemsss, $newArr);
      file_put_contents(resource_path('lang/') . $la->code . '.json', json_encode($result));


      $notification = array(
        'messege' => trim($request->key) . "` has been added",
        'alert' => 'success'
      );
      return redirect()->back()->with('notification', $notification);
    }
  }
  public function deleteLanguageJson(Request $request, $id)
  {
    $this->validate($request, [
      'key' => 'required',
      'value' => 'required'
    ]);

    $reqkey = $request->key;
    $reqValue = $request->value;
    $lang = Language::find($id);
    $data = file_get_contents(resource_path('lang/') . $lang->code . '.json');

    $json_arr = json_decode($data, true);
    unset($json_arr[$reqkey]);

    file_put_contents(resource_path('lang/') . $lang->code . '.json', json_encode($json_arr));


    $notification = array(
      'messege' => trim($request->key) . " has been removed",
      'alert' => 'success'
    );
    return redirect()->back()->with('notification', $notification);
  }

  public function updateLanguageJson(Request $request, $id)
  {
    $this->validate($request, [
      'key' => 'required',
      'value' => 'required'
    ]);

    $reqkey = trim($request->key);
    $reqValue = $request->value;
    $lang = Language::find($id);

    $data = file_get_contents(resource_path('lang/') . $lang->code . '.json');

    $json_arr = json_decode($data, true);

    $json_arr[$reqkey] = $reqValue;

    file_put_contents(resource_path('lang/') . $lang->code . '.json', json_encode($json_arr));

    $notification = array(
      'messege' => 'Update successfully',
      'alert' => 'success'
    );
    return redirect()->back()->with('notification', $notification);
  }

  public function langImport(Request $request)
  {
    $mylang = Language::find($request->myLangid);
    $lang = Language::find($request->id);
    $json = file_get_contents(resource_path('lang/') . $lang->code . '.json');

    $json_arr = json_decode($json, true);

    file_put_contents(resource_path('lang/') . $mylang->code . '.json', json_encode($json_arr));

    return 'success';
  }


  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|max:50',
      'code' => 'required|unique:languages|max:10'
    ]);

    $data = file_get_contents(resource_path('lang/') . 'en.json');
    $json_file = strtolower($request->code) . '.json';
    $path = resource_path('lang/') . $json_file;

    File::put($path, $data);

    $filename = null;


    if ($request->is_default) {
      Language::where('is_default', 1)->update([
        'is_default' => 0
      ]);
    }
    $lang = Language::create([
      'name' => $request->name,
      'direction' => $request->direction,
      'code' => strtolower($request->code),
      'is_default' => $request->is_default ? 1 : 0,
    ]);

    // duplicate First row of settings for current language
    $dbs = Language::where('is_default', 1)->first()->setting;
    $cols = json_decode($dbs, true);

    $bs = new Setting();

    foreach ($cols as $key => $value) {
      // if the column is 'id' [primary key] then skip it
      if ($key == 'id') {
        continue;
      }

      // create logo image using default language image & save unique name in database
      if ($key == 'header_logo') {
        // take default lang image
        $dimg = url('/assets/front/img/') . '/' . $dbs->header_logo;

        // copy paste the default language image with different unique name
        $filename = uniqid();
        if (($pos = strpos($dbs->header_logo, ".")) !== FALSE) {
          $ext = substr($dbs->header_logo, $pos + 1);
        }
        $newImgName = $filename . '.' . $ext;

        @copy($dimg, 'assets/front/img/' . $newImgName);

        // save the unique name in database
        $bs[$key] = $newImgName;

        // continue the loop
        continue;
      }

      // create logo image using default language image & save unique name in database
      if ($key == 'footer_logo') {
        // take default lang image
        $dimg = url('/assets/front/img/') . '/' . $dbs->footer_logo;

        // copy paste the default language image with different unique name
        $filename = uniqid();
        if (($pos = strpos($dbs->footer_logo, ".")) !== FALSE) {
          $ext = substr($dbs->footer_logo, $pos + 1);
        }
        $newImgName = $filename . '.' . $ext;

        @copy($dimg, 'assets/front/img/' . $newImgName);

        // save the unique name in database
        $bs[$key] = $newImgName;

        // continue the loop
        continue;
      }
      // create favicon image using default language image & save unique name in database
      if ($key == 'fav_icon') {
        // take default lang image
        $dimg = url('/assets/front/img/') . '/' . $dbs->fav_icon;

        // copy paste the default language image with different unique name
        $filename = uniqid();
        if (($pos = strpos($dbs->fav_icon, ".")) !== FALSE) {
          $ext = substr($dbs->fav_icon, $pos + 1);
        }
        $newImgName = $filename . '.' . $ext;

        @copy($dimg, 'assets/front/img/' . $newImgName);

        // save the unique name in database
        $bs[$key] = $newImgName;

        // continue the loop
        continue;
      }
      // create breadcrumb image using default language image & save unique name in database
      if ($key == 'breadcrumb_image') {
        // take default lang image
        $dimg = url('/assets/front/img/') . '/' . $dbs->breadcrumb_image;

        // copy paste the default language image with different unique name
        $filename = uniqid();
        if (($pos = strpos($dbs->breadcrumb_image, ".")) !== FALSE) {
          $ext = substr($dbs->breadcrumb_image, $pos + 1);
        }
        $newImgName = $filename . '.' . $ext;

        @copy($dimg, 'assets/front/img/' . $newImgName);

        // save the unique name in database
        $bs[$key] = $newImgName;

        // continue the loop
        continue;
      }

      // create footer_bg_image using default language image & save unique name in database
      if ($key == 'footer_bg_image') {
        // take default lang image
        $dimg = url('/assets/front/img/') . '/' . $dbs->footer_bg_image;

        // copy paste the default language image with different unique name
        $filename = uniqid();
        if (($pos = strpos($dbs->footer_bg_image, ".")) !== FALSE) {
          $ext = substr($dbs->footer_bg_image, $pos + 1);
        }
        $newImgName = $filename . '.' . $ext;

        @copy($dimg, 'assets/front/img/' . $newImgName);

        // save the unique name in database
        $bs[$key] = $newImgName;

        // continue the loop
        continue;
      }
      $bs[$key] = $value;
    };
    $bs['language_id'] = $lang->id;
    $bs->save();


    // duplicate First row of settings for current language
    $dbs = Language::where('is_default', 1)->first()->sectiontitle;
    $cols = json_decode($dbs, true);

    $sectiontitle = new Sectiontitle();

    foreach ($cols as $key => $value) {
      // if the column is 'id' [primary key] then skip it
      if ($key == 'id') {
        continue;
      }

      if ($key == 'video_image') {
        // take default lang image
        $dimg = url('/assets/front/img/') . '/' . $dbs->video_image;

        // copy paste the default language image with different unique name
        $filename = uniqid();
        if (($pos = strpos($dbs->video_image, ".")) !== FALSE) {
          $ext = substr($dbs->video_image, $pos + 1);
        }
        $newImgName = $filename . '.' . $ext;

        @copy($dimg, 'assets/front/img/' . $newImgName);

        // save the unique name in database
        $sectiontitle[$key] = $newImgName;

        // continue the loop
        continue;
      }
      if ($key == 'video_image_right') {
        // take default lang image
        $dimg = url('/assets/front/img/') . '/' . $dbs->video_image_right;

        // copy paste the default language image with different unique name
        $filename = uniqid();
        if (($pos = strpos($dbs->video_image_right, ".")) !== FALSE) {
          $ext = substr($dbs->video_image_right, $pos + 1);
        }
        $newImgName = $filename . '.' . $ext;

        @copy($dimg, 'assets/front/img/' . $newImgName);

        // save the unique name in database
        $sectiontitle[$key] = $newImgName;

        // continue the loop
        continue;
      }
      if ($key == 'video_image_left') {
        // take default lang image
        $dimg = url('/assets/front/img/') . '/' . $dbs->video_image_left;

        // copy paste the default language image with different unique name
        $filename = uniqid();
        if (($pos = strpos($dbs->video_image_left, ".")) !== FALSE) {
          $ext = substr($dbs->video_image_left, $pos + 1);
        }
        $newImgName = $filename . '.' . $ext;

        @copy($dimg, 'assets/front/img/' . $newImgName);

        // save the unique name in database
        $sectiontitle[$key] = $newImgName;

        // continue the loop
        continue;
      }
      if ($key == 'video_bg_image') {
        // take default lang image
        $dimg = url('/assets/front/img/') . '/' . $dbs->video_bg_image;

        // copy paste the default language image with different unique name
        $filename = uniqid();
        if (($pos = strpos($dbs->video_bg_image, ".")) !== FALSE) {
          $ext = substr($dbs->video_bg_image, $pos + 1);
        }
        $newImgName = $filename . '.' . $ext;

        @copy($dimg, 'assets/front/img/' . $newImgName);

        // save the unique name in database
        $sectiontitle[$key] = $newImgName;

        // continue the loop
        continue;
      }
      if ($key == 'w_c_us_image1') {
        // take default lang image
        $dimg = url('/assets/front/img/') . '/' . $dbs->w_c_us_image1;

        // copy paste the default language image with different unique name
        $filename = uniqid();
        if (($pos = strpos($dbs->w_c_us_image1, ".")) !== FALSE) {
          $ext = substr($dbs->w_c_us_image1, $pos + 1);
        }
        $newImgName = $filename . '.' . $ext;

        @copy($dimg, 'assets/front/img/' . $newImgName);

        // save the unique name in database
        $sectiontitle[$key] = $newImgName;

        // continue the loop
        continue;
      }
      if ($key == 'w_c_us_image2') {
        // take default lang image
        $dimg = url('/assets/front/img/') . '/' . $dbs->w_c_us_image2;

        // copy paste the default language image with different unique name
        $filename = uniqid();
        if (($pos = strpos($dbs->w_c_us_image2, ".")) !== FALSE) {
          $ext = substr($dbs->w_c_us_image2, $pos + 1);
        }
        $newImgName = $filename . '.' . $ext;

        @copy($dimg, 'assets/front/img/' . $newImgName);

        // save the unique name in database
        $sectiontitle[$key] = $newImgName;

        // continue the loop
        continue;
      }
      if ($key == 'contact_section_bg_image') {
        // take default lang image
        $dimg = url('/assets/front/img/') . '/' . $dbs->contact_section_bg_image;

        // copy paste the default language image with different unique name
        $filename = uniqid();
        if (($pos = strpos($dbs->contact_section_bg_image, ".")) !== FALSE) {
          $ext = substr($dbs->contact_section_bg_image, $pos + 1);
        }
        $newImgName = $filename . '.' . $ext;

        @copy($dimg, 'assets/front/img/' . $newImgName);

        // save the unique name in database
        $sectiontitle[$key] = $newImgName;

        // continue the loop
        continue;
      }
      if ($key == 'contact_form_image') {
        // take default lang image
        $dimg = url('/assets/front/img/') . '/' . $dbs->contact_form_image;

        // copy paste the default language image with different unique name
        $filename = uniqid();
        if (($pos = strpos($dbs->contact_form_image, ".")) !== FALSE) {
          $ext = substr($dbs->contact_form_image, $pos + 1);
        }
        $newImgName = $filename . '.' . $ext;

        @copy($dimg, 'assets/front/img/' . $newImgName);

        // save the unique name in database
        $sectiontitle[$key] = $newImgName;

        // continue the loop
        continue;
      }
      if ($key == 'faq_bg_image') {
        // take default lang image
        $dimg = url('/assets/front/img/') . '/' . $dbs->faq_bg_image;

        // copy paste the default language image with different unique name
        $filename = uniqid();
        if (($pos = strpos($dbs->faq_bg_image, ".")) !== FALSE) {
          $ext = substr($dbs->faq_bg_image, $pos + 1);
        }
        $newImgName = $filename . '.' . $ext;

        @copy($dimg, 'assets/front/img/' . $newImgName);

        // save the unique name in database
        $sectiontitle[$key] = $newImgName;

        // continue the loop
        continue;
      }
      if ($key == 'faq_image1') {
        // take default lang image
        $dimg = url('/assets/front/img/') . '/' . $dbs->faq_image1;

        // copy paste the default language image with different unique name
        $filename = uniqid();
        if (($pos = strpos($dbs->faq_image1, ".")) !== FALSE) {
          $ext = substr($dbs->faq_image1, $pos + 1);
        }
        $newImgName = $filename . '.' . $ext;

        @copy($dimg, 'assets/front/img/' . $newImgName);

        // save the unique name in database
        $sectiontitle[$key] = $newImgName;

        // continue the loop
        continue;
      }
      if ($key == 'faq_image2') {
        // take default lang image
        $dimg = url('/assets/front/img/') . '/' . $dbs->faq_image2;

        // copy paste the default language image with different unique name
        $filename = uniqid();
        if (($pos = strpos($dbs->faq_image2, ".")) !== FALSE) {
          $ext = substr($dbs->faq_image2, $pos + 1);
        }
        $newImgName = $filename . '.' . $ext;

        @copy($dimg, 'assets/front/img/' . $newImgName);

        // save the unique name in database
        $sectiontitle[$key] = $newImgName;

        // continue the loop
        continue;
      }
      if ($key == 'hero_image') {
        // take default lang image
        $dimg = url('/assets/front/img/') . '/' . $dbs->hero_image;

        // copy paste the default language image with different unique name
        $filename = uniqid();
        if (($pos = strpos($dbs->hero_image, ".")) !== FALSE) {
          $ext = substr($dbs->hero_image, $pos + 1);
        }
        $newImgName = $filename . '.' . $ext;

        @copy($dimg, 'assets/front/img/' . $newImgName);

        // save the unique name in database
        $sectiontitle[$key] = $newImgName;

        // continue the loop
        continue;
      }
      if ($key == 'hero_bg_image') {
        // take default lang image
        $dimg = url('/assets/front/img/') . '/' . $dbs->hero_bg_image;

        // copy paste the default language image with different unique name
        $filename = uniqid();
        if (($pos = strpos($dbs->hero_bg_image, ".")) !== FALSE) {
          $ext = substr($dbs->hero_bg_image, $pos + 1);
        }
        $newImgName = $filename . '.' . $ext;

        @copy($dimg, 'assets/front/img/' . $newImgName);

        // save the unique name in database
        $sectiontitle[$key] = $newImgName;

        // continue the loop
        continue;
      }
      if ($key == 'about_image') {
        // take default lang image
        $dimg = url('/assets/front/img/') . '/' . $dbs->about_image;

        // copy paste the default language image with different unique name
        $filename = uniqid();
        if (($pos = strpos($dbs->about_image, ".")) !== FALSE) {
          $ext = substr($dbs->about_image, $pos + 1);
        }
        $newImgName = $filename . '.' . $ext;

        @copy($dimg, 'assets/front/img/' . $newImgName);

        // save the unique name in database
        $sectiontitle[$key] = $newImgName;

        // continue the loop
        continue;
      }
      if ($key == 'counter_bg_image') {
        // take default lang image
        $dimg = url('/assets/front/img/') . '/' . $dbs->counter_bg_image;

        // copy paste the default language image with different unique name
        $filename = uniqid();
        if (($pos = strpos($dbs->counter_bg_image, ".")) !== FALSE) {
          $ext = substr($dbs->counter_bg_image, $pos + 1);
        }
        $newImgName = $filename . '.' . $ext;

        @copy($dimg, 'assets/front/img/' . $newImgName);

        // save the unique name in database
        $sectiontitle[$key] = $newImgName;

        // continue the loop
        continue;
      }
      if ($key == 'meeet_us_bg_image') {
        // take default lang image
        $dimg = url('/assets/front/img/') . '/' . $dbs->meeet_us_bg_image;

        // copy paste the default language image with different unique name
        $filename = uniqid();
        if (($pos = strpos($dbs->meeet_us_bg_image, ".")) !== FALSE) {
          $ext = substr($dbs->meeet_us_bg_image, $pos + 1);
        }
        $newImgName = $filename . '.' . $ext;

        @copy($dimg, 'assets/front/img/' . $newImgName);

        // save the unique name in database
        $sectiontitle[$key] = $newImgName;

        // continue the loop
        continue;
      }
      $sectiontitle[$key] = $value;
    }
    $sectiontitle['language_id'] = $lang->id;
    $sectiontitle->save();


    // Save New menu
    $menu = new Menu();

    $menu->language_id = $lang->id;
    $menu->menus = '[]';
    $menu->save();

    // Save New menu
    $seo = new Seo();
    $seo->language_id = $lang->id;
    $seo->save();


    $notification = array(
      'messege' => 'Create Successfully',
      'alert' => 'success'
    );

    return redirect()->back()->with('notification', $notification);
  }
}
