<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepenseMissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('depense_mission', function (Blueprint $table) {
       
        $table->increments('id');
         $table->integer('lettre_id')->unsigned();
         $table->integer('unite');
         $table->integer('quantite');
         $table->integer('prix_unit');
         $table->integer('total');

         $table->foreign('lettre_id')
                ->references('id')
                ->on('lettre_mission')
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
        Schema::dropIfExists('depense_mission', function (Blueprint $table) {
            $table->dropForeign('lettre_id');
        });
    }
}
