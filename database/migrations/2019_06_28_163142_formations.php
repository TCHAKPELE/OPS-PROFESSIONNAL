<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Formations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Formations', function (Blueprint $table) {
            $table->bigIncrements('id_formation');
             $table->string('nom_Institut');
            $table->string('nom_formation');
               $table->integer('contact');
                $table->string('email');
                 $table->datetime('Date_debut');
              $table->datetime('Date_fin');
            $table->integer('id_type');
            $table->foreign('id_type')->references('id_type')->on('typeformations');
            $table->timestamp('created_at')->nullable();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('Formations');
    }
}
