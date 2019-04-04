<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepenseCouranteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

         Schema::create('depense_courante', function (Blueprint $table) {

        $table->increments('id');
         $table->integer('employ_id')->unsigned();
         $table->date('dat');
         $table->string('objet');
         $table->integer('total');

         $table->foreign('employ_id')
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
       Schema::dropIfExists('depense_courante', function (Blueprint $table) {
            $table->dropForeign('employ_id');
        });
    }
}
