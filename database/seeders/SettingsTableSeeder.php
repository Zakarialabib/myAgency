<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * @var array
     */
    protected $settings = [
        [
            'key'                       =>  'website_title',
            'lang'                       =>  'en',
            'value'                     =>  'Sparksalze',
        ],
        [
            'key'                       =>  'base_color',
            'value'                     =>  '#00000',
        ],
        [
            'key'                       =>  'site_logo',
            'value'                     =>  'logo.png',
        ],
        [
            'key'                       =>  'fav_icon',
            'value'                     =>  'favicon.png',
        ],
        [
            'key'                       =>  'phone_number',
            'value'                     =>  '+212638041919',
        ],
        [
            'key'                       =>  'email',
            'value'                     =>  'collab@sparksalze.com',
        ],
        [
            'key'                       =>  'address',
            'value'                     =>  'casablanca',
        ],
        [
            'key'                       =>  'footer_text',
            'value'                     =>  'made with love in morocco',
        ],
        [
            'key'                       =>  'copyright_text',
            'value'                     =>  'All rights are resereved',
        ],
        [
            'key'                       =>  'meta_keywords',
            'value'                     =>  'Sparksalze a startup maker in morcco',
        ],
        [
            'key'                       =>  'meta_description',
            'value'                     =>  'Sparksalze a startup maker located in morocco, Working E-commerce, travelling and building saas that last',
        ],
        [
            'key'                       =>  'social_facebook',
            'value'                     =>  '#',
        ],
        [
            'key'                       =>  'social_twitter',
            'value'                     =>  '#',
        ],
        [
            'key'                       =>  'social_instagram',
            'value'                     =>  '#',
        ],
        [
            'key'                       =>  'social_linkedin',
            'value'                     =>  '#',
        ],
        [
            'key'                       =>  'social_whatsapp',
            'value'                     =>  '#',
        ],
        [
            'key'                       =>  'head_tags',
            'value'                     =>  '#',
        ],
        [
            'key'                       =>  'body_tags',
            'value'                     =>  '#',
        ],
        [
            'key'                       =>  'announcement',
            'value'                     =>  '#',
        ],
        [
            'key'                       =>  'announcement_delay',
            'value'                     =>  '#',
        ],
        [
            'key'                       =>  'cookie_alert_text',
            'value'                     =>  '#',
        ],
        [
            'key'                       =>  'is_preloader',
            'value'                     =>  '#',
        ],
        [
            'key'                       =>  'preloader_icon',
            'value'                     =>  '#',
        ],
        [
            'key'                       =>  'preloader_bg_color',
            'value'                     =>  '#',
        ],
        [
            'key'                       =>  'is_whatsapp',
            'value'                     =>  '#',
        ],
        [
            'key'                       =>  'is_cooki_alert',
            'value'                     =>  '#',
        ],
        
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $index => $setting)
        {
            $result = Setting::create($setting);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->settings). ' records');
    }
}