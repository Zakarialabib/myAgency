<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use Illuminate\Support\Str;

class SettingSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()

    {
        $settings = [
            [
                'id' => '1', 
                'language_id' => '1', 
                'website_title' => 'Spark', 
                'base_color'=> '00000', 
                'header_logo'=> 'logo', 
                'footer_logo'=> 'logo', 
                'fav_icon'=> 'logo', 
                'breadcrumb_image'=> 'logo1', 
                'phone_number'=> '0000000000', 
                'email'=> 'contact@sparksalze.com', 
                'contactemail'=> 'contact@sparksalze.com', 
                'address'=> 'address', 
                'footer_text'=> 'We’ll take your business to the next level, with our proven<br>strategies, latest technologies
                and friendly creatives that<br>will work to produce the best outcome possible.', 
                'meta_keywords'=> 'SparkSalze', 
                'meta_description'=> 'SparkSalze', 
                'copyright_text'=> 'SparkSalze', 
                'facebook_pexel'=> 'SparkSalze', 
                'google_analytics'=> 'SparkSalze', 
                'messenger_link'=> 'SparkSalze', 
                'whatsapp_link'=> 'SparkSalze', 
                'announcement'=> '1', 
                'announcement_delay'=> '1', 
                'maintainance_text'=> '1', 
                'cookie_alert_text'=> '1', 
                'is_video_hero'=> '1', 
                'is_whatsapp'=> '1', 
                'is_call_button'=> '1', 
                'maintainance_image'=> '1', 
            ],
        ];
        Setting::insert($settings);
    }

}