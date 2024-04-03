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
            $table->integer('rto_days')->nullable()->change();
            $table->integer('rto_hours')->nullable()->change();
            $table->integer('rto_minutes')->nullable()->change();
            $table->integer('rpo_days')->nullable()->change();
            $table->integer('rpo_hours')->nullable()->change();
            $table->integer('rpo_minutes')->nullable()->change();
            $table->text('recurso_humano')->nullable();
            $table->text('herramientas')->nullable();
            $table->text('registros_vitales')->nullable();
            $table->text('recomendaciones_recuperacion')->nullable();
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
