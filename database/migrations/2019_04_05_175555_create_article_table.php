<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
      Schema::create('article', function (Blueprint $table) {

         $table->increments('id');
         $table->string('description');
         $table->integer('quantite');
         $table->integer('prix_unitaire');
         $table->integer('total');
         $table->integer('dep_id')->unsigned();


         $table->foreign('dep_id')
                ->references('id')
                ->on('depense_courante')
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
        Schema::dropIfExists('article', function (Blueprint $table) {
            $table->dropForeign('dep_id');
        });
    }
}
