<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerdiemExpertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('perdiems_expert', function (Blueprint $table) {

         $table->increments('id');
         $table->integer('depense_m_id')->unsigned();
         
         $table->foreign('depense_m_id')
                ->references('id')
                ->on('depense_mission')
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
      Schema::dropIfExists('perdiems_expert', function (Blueprint $table) {
        $table->dropForeign('depense_m_id');
        });


    }
}
