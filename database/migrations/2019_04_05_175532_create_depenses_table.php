<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('depense', function (Blueprint $table) {

            $table->increments('id');
         $table->integer('pro_id')->unsigned();
         $table->integer('total');

         $table->foreign('pro_id')
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
        Schema::dropIfExists('depense', function (Blueprint $table) {
            $table->dropForeign('pro_id');
        });
    }
}
