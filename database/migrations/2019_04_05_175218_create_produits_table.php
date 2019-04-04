<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
      
    Schema::create('produit', function (Blueprint $table) {

         $table->increments('id');
         $table->string('libelle');
        
        $table->integer('client_id')->unsigned();
         
         $table->foreign('client_id')
                ->references('id')
                ->on('clients')
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
        Schema::dropIfExists('produit', function (Blueprint $table)  { 
            $table->dropForeign('client_id');
        });

    }
}
