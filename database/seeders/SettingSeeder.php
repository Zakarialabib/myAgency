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
                'site_logo'=> 'logo', 
                'fav_icon'=> 'logo',
                'phone_number'=> '0000000000', 
                'email'=> 'contact@sparksalze.com',  
                'address'=> 'address', 
                'footer_text'=> "We’ll take your business to the next level, with our proven<br>strategies, latest technologies
                and friendly creatives that<br>will work to produce the best outcome possible.", 
                'copyright_text'=> 'SparkSalze', 
                'meta_keywords'=> 'SparkSalze', 
                'meta_description'=> 'SparkSalze', 
                'head_tags'=> 'SparkSalze', 
                'body_tags'=> 'SparkSalze', 
                'social_facebook'=> 'SparkSalze', 
                'social_twitter'=> 'SparkSalze', 
                'social_instagram'=> 'SparkSalze', 
                'social_linkedin'=> 'SparkSalze', 
                'social_whatsapp'=> 'SparkSalze', 
                'announcement'=> '1', 
                'announcement_delay'=> '1',  
                'cookie_alert_text'=> '1', 
                'is_whatsapp'=> '1', 
                'is_cooki_alert'=> '1'
            ],
            [
                'id' => '2', 
                'language_id' => '2', 
                'website_title' => 'Spark', 
                'base_color'=> '00000', 
                'site_logo'=> 'logo', 
                'fav_icon'=> 'logo',
                'phone_number'=> '0000000000', 
                'email'=> 'contact@sparksalze.com',  
                'address'=> 'address', 
                'footer_text'=> "We’ll take your business to the next level, with our proven<br>strategies, latest technologies
                and friendly creatives that<br>will work to produce the best outcome possible.", 
                'copyright_text'=> 'SparkSalze', 
                'meta_keywords'=> 'SparkSalze', 
                'meta_description'=> 'SparkSalze', 
                'head_tags'=> 'SparkSalze', 
                'body_tags'=> 'SparkSalze', 
                'social_facebook'=> 'SparkSalze', 
                'social_twitter'=> 'SparkSalze', 
                'social_instagram'=> 'SparkSalze', 
                'social_linkedin'=> 'SparkSalze', 
                'social_whatsapp'=> 'SparkSalze', 
                'announcement'=> '1', 
                'announcement_delay'=> '1',  
                'cookie_alert_text'=> '1', 
                'is_whatsapp'=> '1', 
                'is_cooki_alert'=> '1'
            ],
        ];
        Setting::insert($settings);
    }

}