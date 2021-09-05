<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maisons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('centre_id');
            $table->foreign('centre_id')->references('id')->on('centres')->onDelete('cascade');
            $table->timestamps();
            $table->string('libelle');
            $table->string('description');
            $table->integer('nombre_chambre');
            $table->integer('prix_par_nuit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('maisons');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
