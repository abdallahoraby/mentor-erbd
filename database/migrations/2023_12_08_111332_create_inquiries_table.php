<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('site_id')->unsigned();
            $table->foreign('site_id')->references('id')->on('sites');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('comment')->nullable();
            $table->text('url')->nullable();
            $table->text('ip_address')->nullable();
            $table->json('saved_data')->nullable();
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
        Schema::drop('inquiries');
    }
}
