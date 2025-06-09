<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

public function up()
{
    Schema::create('postulacions', function (Blueprint $table) {
        $table->id();
        $table->string('foto')->nullable();
        $table->string('nombre');
        $table->string('grado');
        $table->text('descripcion')->nullable();
        $table->timestamps();
    });
}



    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::dropIfExists('postulacions');
    // }
};
