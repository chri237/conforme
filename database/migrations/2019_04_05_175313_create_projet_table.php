<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projet', function (Blueprint $table) {

         $table->increments('id');
         $table->string('nom');
        $table->date('date');

        
        $table->integer('interlocuteur_id')->unsigned();
        $table->foreign('interlocuteur_id')
                ->references('id')
                ->on('interlocuteur')
                ->onDelete('RESTRICT ')
                ->onUpdate('RESTRICT ');
         $table->integer('expert_id')->unsigned();
        $table->foreign('expert_id')
                ->references('id')
                ->on('expert')
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
        Schema::dropIfExists('projet', function (Blueprint $table)  {
         $table->dropForeign('interlocuteur_id');
         $table->dropForeign('expert_id');
        });

    }
}
