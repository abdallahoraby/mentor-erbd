<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomFieldsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('site_id')->unsigned();
            $table->text('name');
            $table->text('default_value')->nullable();
            $table->text('label_title');
            $table->text('additional_class')->nullable();
            $table->text('validation')->nullable();
            $table->enum('type', array('text','number','date','file','editor','checkbox', 'select','multi_select','radio','email','password'));
            $table->boolean('is_searchable')->default(0);
            $table->integer('order');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('site_id')->references('id')->on('sites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('custom_fields');
    }
}
