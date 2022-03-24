<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\language;
use Illuminate\Support\Str;

class CreateLanguages extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()

    {
        $languages = [
            [
                'name' => 'English',
                'code' => 'en',
                'is_default' => 1,
                'is_active' =>1
            ],
            [
                'name' => 'Franch',
                'code' => 'fr',
                'is_default' => 0,
                'is_active' =>1
            ],
            [
                'name' => 'Arabic', 
                'code' => 'ar',
                'is_default' => 0, 
                'is_active' =>1
            ],
        ];
        Language::insert($languages);
    }

}