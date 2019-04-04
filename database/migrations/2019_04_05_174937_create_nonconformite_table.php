<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNonconformiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('non_conformite', function (Blueprint $table) {

         $table->increments('id');
         $table->date('date');
         $table->string('processus');
         $table->string('non_conformite');
         $table->string('diagnostic');
         $table->integer('gravite');
         $table->date('date_diagnotic');
         $table->string('action_correction');
         $table->date('date_correction');
         $table->date('date_verification');
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
        Schema::dropIfExists('non_conformite', function (Blueprint $table)  {});

    }
}
