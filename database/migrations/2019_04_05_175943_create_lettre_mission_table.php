<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLettreMissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('lettre_mission', function (Blueprint $table) {

         $table->increments('id');
         $table->integer('module_id')->unsigned();
         $table->integer('total');

         $table->foreign('module_id')
                ->references('id')
                ->on('module')
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
        Schema::dropIfExists('lettre_mission', function (Blueprint $table) {
            $table->dropForeign('module_id');
        });


    }
}
