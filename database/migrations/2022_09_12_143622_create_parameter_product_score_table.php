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
        Schema::create('parameter_product_score', function (Blueprint $table) {
            $table->foreignId('parameter_id')->constrained('parameters');
            $table->foreignId('product_score_id')->constrained('product_scores');
            $table->integer('calificacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parameter_product_score');
    }
};
