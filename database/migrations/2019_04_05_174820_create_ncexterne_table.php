<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNcexterneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
    Schema::create('ncexterne', function (Blueprint $table) {

         $table->increments('id');
         $table->integer('non_confor_id')->unsigned();

         $table->foreign('non_confor_id')
                ->references('id')
                ->on('non_conformite')
                ->onDelete('RESTRICT ')
                ->onUpdate('RESTRICT ');

         $table->integer('plainte_client_id')->unsigned();

         $table->foreign('plainte_client_id')
                ->references('id')
                ->on('plaintesclient')
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
        Schema::dropIfExists('ncexterne', function (Blueprint $table)  { 
            $table->dropForeign('non_confor_id');
             $table->dropForeign('plainte_client_id');
        });

    }
}
