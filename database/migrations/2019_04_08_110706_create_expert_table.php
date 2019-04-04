<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expert', function (Blueprint $table) {

         $table->increments('id');
         $table->string('nom');
         $table->string('typ')->nullable();
         $table->string('email')->unique();
         $table->integer('tel1');
         $table->integer('tel2');
         
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
                      Schema::dropIfExists('expert', function (Blueprint $table) {});

    }
}
