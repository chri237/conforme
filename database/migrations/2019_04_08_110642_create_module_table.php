<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
       Schema::create('module', function (Blueprint $table) {

         $table->increments('id');
         $table->integer('projet_id')->unsigned();
         $table->string('libelle');

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
        Schema::dropIfExists('module', function (Blueprint $table) {
            $table->dropForeign('projet_id');
        });

    }
}
