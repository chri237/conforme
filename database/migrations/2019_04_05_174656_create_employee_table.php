
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('employee', function (Blueprint $table) {

         $table->increments('id');
         $table->string('nom');
         $table->string('prenom');
         $table->string('poste');
         $table->string('email')->unique();
         $table->string('adresse');
         $table->integer('tel1');
         $table->integer('tel2')->nullable();
         $table->integer('whatsapp')->nullable();

         $table->string('login');
         $table->string('password');
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
              Schema::dropIfExists('employee', function (Blueprint $table) 
                {});

    }
}
