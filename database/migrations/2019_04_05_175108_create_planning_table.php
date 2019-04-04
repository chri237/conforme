<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
      
     Schema::create('planning', function (Blueprint $table) {

         $table->increments('id');
         $table->date('date_fin');
         $table->date('date_previsionnel');
         $table->date('date_demarrage');
         $table->string('observation')->nullable();

      
         
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
        Schema::dropIfExists('planning', function (Blueprint $table)  {});

    }
}
