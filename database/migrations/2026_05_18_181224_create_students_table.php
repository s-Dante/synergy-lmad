<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('matricula')->unique();
            $table->string('email')->unique();
            $table->string('correo_contacto')->nullable();
            $table->string('telefono_contacto')->nullable();
            $table->string('avatar')->nullable();
            $table->string('cv')->nullable();
            $table->string('portafolio')->nullable();
            $table->json('red_social')->nullable();
            $table->string('rama')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_students');
    }
};
