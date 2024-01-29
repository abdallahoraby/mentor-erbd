<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id('id');
            $table->string('url');
            $table->text('title');
            $table->string('logo');
            $table->string('banner')->nullable();
            $table->text('short_desc')->nullable();
            $table->longtext('content')->nullable();
            $table->text('about_title')->nullable();
            $table->text('about_desc')->nullable();
            $table->string('about_image')->nullable();
            $table->string('page_color')->nullable();
            $table->string('page_background_color')->nullable();
            $table->string('call_to_action_button_color')->nullable();
            $table->text('call_to_action_button_content')->nullable();
            $table->text('copy_right')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();

            $table->bigInteger('theme_id');
            $table->bigInteger('country_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sites');
    }
}
