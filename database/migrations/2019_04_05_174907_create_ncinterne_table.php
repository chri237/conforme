<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNcinterneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
    Schema::create('ncinterne', function (Blueprint $table) {

         $table->increments('id');
         $table->integer('non_confor_id')->unsigned();

         $table->foreign('non_confor_id')
                ->references('id')
                ->on('non_conformite')
                ->onDelete('RESTRICT ')
                ->onUpdate('RESTRICT ');

         $table->integer('employee_id')->unsigned();

         $table->foreign('employee_id')
                ->references('id')
                ->on('employee')
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
        Schema::dropIfExists('ncinterne', function (Blueprint $table)  { 
          $table->dropForeign('non_confor_id');
         $table->dropForeign('employee_id');
        });


    }
}
