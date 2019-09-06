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
            $table->string('email');
            $table->integer('tel');
            $table->boolean('statut');
            $table->integer('statut2')->default(0);
            $table->integer('num_place')->default(0);
            $table->boolean('complet');
             $table->datetime('Date_debut')->default(null);
              $table->datetime('Date_fin')->default(null);
            $table->string('mot_de_passe')->default(0000);
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
