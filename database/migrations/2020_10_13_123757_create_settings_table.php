<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            
            $table->string('language_id')->nullable();
            $table->string('website_title')->nullable();
            $table->string('base_color')->nullable();
            
            $table->string('site_logo')->nullable();
            $table->string('fav_icon')->nullable();
            
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();

            $table->text('footer_text')->nullable();
            $table->string('copyright_text')->nullable();
            
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();

            $table->text('social_facebook')->nullable();
            $table->string('social_twitter')->nullable();
            $table->text('social_instagram')->nullable();
            $table->string('social_linkedin')->nullable();
            $table->string('social_whatsapp')->nullable();

            $table->text('head_tags')->nullable();
            $table->text('body_tags')->nullable();

            $table->string('announcement', 255)->nullable();
            $table->decimal('announcement_delay', 11, 2)->default(0.00);
            $table->binary('cookie_alert_text')->nullable();
            
            $table->tinyInteger('is_preloader')->default(1);
            $table->string('preloader_icon')->nullable();
            $table->string('preloader_bg_color')->nullable();

            $table->tinyInteger('is_whatsapp')->default(1);
            $table->tinyInteger('is_cooki_alert')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
