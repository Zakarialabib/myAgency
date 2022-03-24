<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPreloaderInfoToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->tinyInteger('is_preloader')->default(1);
            $table->string('preloader_icon')->nullable();
            $table->string('preloader_bg_color')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(
                'is_preloader',
                'preloader_icon',
                'preloader_bg_color'
            );
        });
    }
}
