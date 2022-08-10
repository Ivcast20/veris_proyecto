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
        Schema::create('criterio_impacto_nivel', function (Blueprint $table) {
            $table->foreignId('criterio_impacto_id')->constrained('criterio_impactos');
            $table->foreignId('nivel_id')->constrained('niveles');
            $table->primary(['criterio_impacto_id', 'nivel_id']);
            $table->text('descripcion');
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
        Schema::dropIfExists('criterio_impacto_nivel');
    }
};
