<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMeetTextToSectiontitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sectiontitles', function (Blueprint $table) {
            $table->string('meeet_us_text')->nullable()->after('meeet_us_bg_image');
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
            $table->dropColumn('opening_hours');
        });
    }
}
