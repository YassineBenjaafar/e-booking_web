<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('rank');
            $table->string('ecode');
            $table->string('family_situation');
            $table->integer('number_of_children');
            $table->date('starting_date_in_office');
            $table->integer('points')->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->timestamps();       
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
