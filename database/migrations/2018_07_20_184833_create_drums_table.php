<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drums', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps(); 
            $table->text('drumname'); // name (and perhaps manufacturer/make + model) of drum 
            $table->text('body'); 
            $table->text('image');  // path-to-image 
            // contact-detail/s 
            $table->integer('user_id'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drums');
    }
}
