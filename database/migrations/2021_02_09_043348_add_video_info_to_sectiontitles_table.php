<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVideoInfoToSectiontitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sectiontitles', function (Blueprint $table) {
            
            $table->text('video_content')->nullable()->after('video_link');
            $table->string('video_bg_image')->nullable()->after('video_link');
            $table->string('video_image_left')->nullable()->after('video_link');
            $table->string('video_image_right')->nullable()->after('video_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sectiontitles', function (Blueprint $table) {
            $table->dropColumn('video_content', 'video_bg_image', 'video_image_left', 'video_image_right');
        });
    }
}
