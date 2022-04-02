<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->integer('language_id')->nullable();
            $table->string('title', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('client_name', 255)->nullable();
            $table->string('link')->nullable();
            $table->string('featured_image', 255)->nullable();
            $table->integer('service_id')->nullable();
            $table->text('content')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
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
        Schema::dropIfExists('portfolios');
    }
}
