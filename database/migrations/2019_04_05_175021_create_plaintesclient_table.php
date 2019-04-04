<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaintesclientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plaintesclients', function (Blueprint $table) {

         $table->increments('id');
         $table->string('plainte');
         $table->date('date');
         $table->string('diagnostic');
         $table->string('action_traitement');
         $table->date('date_action');
         $table->date('date_traitement');
         $table->integer('employee_id')->unsigned();
         $table->integer('projet_id')->unsigned();
         $table->foreign('employee_id')
                ->references('id')
                ->on('employee')
                ->onDelete('RESTRICT ')
                ->onUpdate('RESTRICT ');
        $table->foreign('projet_id')
                ->references('id')
                ->on('projet')
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
        Schema::dropIfExists('plaintesclients', function (Blueprint $table)  {
         $table->dropForeign('projet_id');
         $table->dropForeign('employee_id');
        });
    }
}