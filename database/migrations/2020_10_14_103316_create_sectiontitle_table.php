<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionTitleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectiontitles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('language_id')->nullable();

            $table->string('page')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('text')->nullable();
            $table->text('button')->nullable();
            $table->text('link')->nullable();
            $table->string('content')->nullable();
            $table->string('video')->nullable();
            $table->text('image')->nullable();

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
        Schema::dropIfExists('section_title');
    }
}
