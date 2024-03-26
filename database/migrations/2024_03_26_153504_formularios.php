<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formularios', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_elaboracion');
            $table->string('actividad');
            $table->enum('nivel_operativo', ['Alta', 'Medio', 'Bajo']);
            $table->enum('nivel_financiero', ['Alta', 'Medio', 'Bajo']);
            $table->enum('nivel_legal', ['Alta', 'Medio', 'Bajo']);
            $table->float('peso_operativo');
            $table->float('peso_financiero');
            $table->float('peso_legal');
            $table->float('valor_inherente');
            $table->string('escala');
            $table->integer('rto_days')->default(0); // Días de tiempo de recuperación objetivo
            $table->time('rto_time')->default('00:00:00'); // Horas y minutos de tiempo de recuperación objetivo
            $table->integer('rpo_days')->default(0); // Días de tiempo de recuperación real
            $table->time('rpo_time')->default('00:00:00'); // Horas y minutos de tiempo de recuperación real
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
        Schema::dropIfExists('formularios');
    }
};
