<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('clients', function (Blueprint $table) {
       
         $table->increments('id');
         $table->string('nom');
         $table->string('ville');
         $table->string('pays');
         $table->string('email')->unique();
         $table->integer('tel');
         $table->string('secteur_activite');
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
       Schema::dropIfExists('clients', function (Blueprint $table) {
        });
    }
}
