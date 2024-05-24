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
        Schema::disableForeignKeyConstraints();

        Schema::create('colaboradores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('igreja_id')->index();
            $table->foreign('igreja_id')->references('id')->on('igrejas');
            $table->string('nome');
            $table->bigInteger('setor_id');
            $table->foreign('setor_id')->references('id')->on('setor_igrejas');
            $table->bigInteger('dias_id');
            $table->foreign('dias_id')->references('id')->on('dias');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaboradores');
    }
};
