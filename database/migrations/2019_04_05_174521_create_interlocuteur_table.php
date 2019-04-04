<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterlocuteurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interlocuteur', function (Blueprint $table) {

         $table->increments('id');
         $table->string('nom');
         $table->integer('client_id')->unsigned();
         $table->string('email')->unique();
         $table->integer('tel1');
         $table->integer('tel2')->nullable();

         $table->timestamps();

          $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->onDelete('RESTRICT ')
                ->onUpdate('RESTRICT ');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
              Schema::dropIfExists('interlocuteur', function (Blueprint $table)
                 {
                     $table->dropForeign('client_id');
        });


    }
}
