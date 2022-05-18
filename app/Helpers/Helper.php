<?php

namespace App\Helpers;

use App\Models\Language;
use App\Models\Daynamicpage;
use Illuminate\Support\Facades\Session;
use Storage;
use Carbon;

class Helper
{

    public static function make_slug($string) {
        $slug = preg_replace('/\s+/u', '-', trim($string));
        $slug = str_replace("/","",$slug);
        $slug = str_replace("?","",$slug);
        return $slug;
    }

    public static function convertUtf8($value){
        return mb_detect_encoding($value, mb_detect_order(), true) === 'UTF-8' ? $value : mb_convert_encoding($value, 'UTF-8');
    }

    public static function removeFile($path)
    {
        return file_exists($path) && is_file($path) ? @unlink($path) : false;
    }

    public static function getHref($link){
          
        $href = "#";

        if ($link["type"] == 'home') {
            $href = route('front.index');
        } 
        else if ($link["type"] == 'about') {
            $href = route('front.about');
        } 
        else if ($link["type"] == 'services') {
            $href = route('front.service');
        } 
        else if ($link["type"] == 'portfolios') {
            $href = route('front.portfolio');
        } 
        else if ($link["type"] == 'packages') {
            $href = route('front.package');
        }
        else if ($link["type"] == 'team') {
            $href = route('front.team');
        } 
        else if ($link["type"] == 'faq') {
            $href = route('front.faq');
        } 
        else if ($link["type"] == 'gallery') {
            $href = route('front.gallery');
        } 
        else if ($link["type"] == 'career') {
            $href = route('front.career');
        } 
        else if ($link["type"] == 'blogs') {
            $href = route('front.blogs');
        } 
        else if ($link["type"] == 'products') {
            $href = route('front.products');
        } 
        else if ($link["type"] == 'products' || $link["type"] == 'products-mega') {
            $href = route('front.products');
        } 
        else if ($link["type"] == 'contact') {
            $href = route('front.contact');
        } 
        else {
            $pageid = (int)$link["type"];
            $page = Daynamicpage::find($pageid);
            if (!empty($page)) {
                $href = route('front.front_dynamic_page', [$page->slug]);
            } else {
                $href = '#';
            }
        }

        return $href;
        
    }

    public static function createMenu($arr){
        echo '<ul style="z-index: 0;" class="submenu">';
        foreach ($arr["children"] as $el) {

            // determine the href
            $href = Helper::getHref($el);

            echo '<li>';
            echo '<a  href="'.$href.'" target="'.$el["target"].'">'.$el["text"].'</a>';
            if (array_key_exists("children", $el)) {
                Helper::createMenu($el);
            }
            echo '</li>';
        }
        echo '</ul>';
    }


  

    public static function upload(string $dir, string $format, $image = null)
    {
        if ($image != null) {
            $imageName = \Carbon\Carbon::now()->toDateString() . "-" . uniqid() . "." . $format;
            if (!Storage::disk('local')->exists($dir)) {
                Storage::disk('local')->makeDirectory($dir);
            }
            Storage::disk('local')->put($dir . $imageName, file_get_contents($image));
        } else {
            $imageName = 'def.png';
        }

        return $imageName;
    }
    public static function update(string $dir, $old_image, string $format, $image = null)
    {
        if($image == null)
        {
            return $old_image;
        }
        if (Storage::disk('local')->exists($dir . $old_image)) {
            Storage::disk('local')->delete($dir . $old_image);
        }
        $imageName = Helper::upload($dir, $format, $image);
        return $imageName;
    }
}
