<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotacionsTable extends Migration
{
    public function up()
    {
        Schema::create('votacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('postulacion_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('postulacion_id')->references('id')->on('postulacions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('votacions');
    }
}
