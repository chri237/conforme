<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerdiemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perdiems', function (Blueprint $table) {

         $table->increments('id');
         $table->integer('prevision_id')->unsigned();
         
         $table->foreign('prevision_id')
                ->references('id')
                ->on('prevision')
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
      Schema::dropIfExists('perdiems', function (Blueprint $table) {
        $table->dropForeign('prevision_id');
        });


    }
}
