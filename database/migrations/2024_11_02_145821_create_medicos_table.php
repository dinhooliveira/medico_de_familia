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
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_completo');
            $table->date('data_nascimento');
            $table->unsignedBigInteger('nacionalidade_id')->nullable();
            $table->unsignedBigInteger('estado_civil_id')->nullable();
            $table->unsignedBigInteger("user_id");
            $table->string('rg');
            $table->string('cpf')->unique();
            $table->string('endereco');
            $table->string('telefone');
            $table->string('email')->unique();
            $table->string('crm')->unique();
            $table->timestamps();
            $table->foreign('estado_civil_id')->references('id')->on('estados_civis')->onDelete('set null');
            $table->foreign('nacionalidade_id')->references('id')->on('nacionalidades')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicos');
    }
};
