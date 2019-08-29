<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppelDOffre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Appel_D_offres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_entreprise');
            $table->string('num_identification');
           $table->datetime('Date_debut');
              $table->datetime('Date_fin');
            $table->integer('renumeration');
            $table->string('email');
            $table->integer('tel');
            $table->boolean('statut');
            $table->integer('num_place');
            $table->boolean('complet');
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
        Schema::dropIfExists('Appel_D_offres');
    }
}
