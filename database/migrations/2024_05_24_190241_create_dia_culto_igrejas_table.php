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

        Schema::create('dia_culto_igrejas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('igreja_id')->index();
            $table->foreign('igreja_id')->references('id')->on('igrejas');
            $table->bigInteger('dia_Id')->index();
            $table->foreign('dia_Id')->references('id')->on('dias');
            $table->time('horario');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dia_culto_igrejas');
    }
};
