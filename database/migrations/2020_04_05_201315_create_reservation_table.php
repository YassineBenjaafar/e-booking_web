<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('maison_id');
            $table->foreign('maison_id')->references('id')->on('maisons')->onDelete('cascade');
            $table->unsignedBigInteger('salarie_id');
            $table->foreign('salarie_id')->references('id')->on('salaries')->onDelete('cascade');
            $table->unsignedBigInteger('feedback_id')->nullable();
            $table->foreign('feedback_id')->references('id')->on('feedbacks');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->double('montant');
            $table->foreign('etat_id')->references('id')->on('etats');
            $table->unsignedBigInteger('etat_id');

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

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('reservation');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
