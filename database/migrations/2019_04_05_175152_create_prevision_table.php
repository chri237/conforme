<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrevisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
      
   Schema::create('prevision', function (Blueprint $table) {

         $table->increments('id');
         $table->integer('unite');
         $table->integer('quantite');
         $table->integer('prix_unit');
         $table->integer('total');
        $table->integer('depense_id')->unsigned();
         
         $table->foreign('depense_id')
                ->references('id')
                ->on('depense')
                ->onDelete('RESTRICT ')
                ->onUpdate('RESTRICT ');

      
         
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
        Schema::dropIfExists('prevision', function (Blueprint $table)  { 
         $table->dropForeign('depense_id');
        });

    }
}
