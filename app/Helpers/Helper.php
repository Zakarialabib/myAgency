<?php

namespace App\Helpers;


use App\Models\Currency;
use App\Models\Language;
use App\Models\Shipping;
use App\Models\Permalink;
use App\Models\Daynamicpage;
use Illuminate\Support\Facades\Session;

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
    
    public static function showCurrencyPrice($price) {


        if (Session::has('currency')){
            $curr = Currency::where('id', session()->get('currency'))->first();
        }
        else
        {
            $curr = Currency::where('is_default', 1)->first();
        }

        $price = round($price * $curr->value, 2);


        return $curr->sign.$price;


    }


    public static function showAdminCurrencyPrice($price) {
        if (Session::has('currency')){
            $curr = Currency::where('id', session()->get('currency'))->first();
        }
        else
        {
            $curr = Currency::where('is_default', 1)->first();
        }
        $price = round($price * $curr->value,2);
        return $curr->sign.$price;
    }


      public static function storePrice($price) {
        if (Session::has('currency')){
            $curr = Currency::where('id', session()->get('currency'))->first();
        }
        else
        {
            $curr = Currency::where('is_default', 1)->first();
        }
        $price = ($price / $curr->value);
        return $price;
    }


    public static function showCurrency()
    {
        if (Session::has('currency')){
            $curr = Currency::where('id', session()->get('currency'))->first();
        }
        else
        {
            $curr = Currency::where('is_default', 1)->first();
        }
        return $curr->sign;
    }

    public static function showCurrencyCode()
    {
        if (Session::has('currency')){
            $curr = Currency::where('id', session()->get('currency'))->first();
        }
        else
        {
            $curr = Currency::where('is_default', 1)->first();
        }
        return $curr->name;
    }

    public static function showCurrencyValue()
    {
        if (Session::has('currency')){
            $curr = Currency::where('id', session()->get('currency'))->first();
        }
        else
        {
            $curr = Currency::where('is_default', 1)->first();
        }
        return $curr->value;
    }


    public static function showPrice($price) {

        if (Session::has('currency')){
            $curr = Currency::where('id', session()->get('currency'))->first();
        }
        else
        {
            $curr = Currency::where('is_default', 1)->first();
        }
        
        $price = $price * $curr->value;

        return round($price,2);

    }

    public static function showPriceInOrder($price, $value) {
        $price = $price * $value;
        return round($price, 2);
    }

    public static function cartTotal($cart){
        $total = 0;

      

        foreach ($cart as $key => $product) {
            $total += $product['price'] * $product['qty'];
        }
    
        if(Session::has('currency')){
            $curr = Currency::findOrFail(Session::get('currency'));
        }else{
            $curr = Currency::where('is_default',1)->first();
        }
        return $total / $curr->value;
    }


    public static function Total($final_shipping_charge = 0)
    {
        if(Session::has('cart')){
            $cart_data = Session::get('cart');
            $cartTotal = 0;

            if($cart_data){
                foreach($cart_data as $product){
                    $cartTotal += (double)Helper::showPrice($product['price'] * (int)$product['qty']);
                }
            }

            $total = $cartTotal+$final_shipping_charge;
    
            return $total;

        }else{
            return 0;
        }
        
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

    

}


