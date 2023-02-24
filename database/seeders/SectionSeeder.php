<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Section::insert([
            [
                'id'             => 1,
                'title'          => 'Welcome to appAgency',
                'image'          => 'image.jpg',
                'featured_title' => 'appAgency',
                'subtitle'       => 'appAgency',
                'label'          => 'appAgency',
                'link'           => 'https://appAgency.com/',
                'description'    => 'appAgency',
                'status'         => '1',
                'bg_color'       => 'bg-green-500',
                'text_color'       => 'bg-green-500',
                'position'       => '1',
                'language_id'    => '1',
            ],
        ]);
    }
}
