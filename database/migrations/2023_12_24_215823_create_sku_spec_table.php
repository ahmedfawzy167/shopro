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
        Schema::create('sku_spec', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sku_id')->index();
            $table->unsignedBigInteger('spec_id')->index();
            $table->string('value',50);
            $table->timestamps();
            $table->foreign('sku_id')->references('id')->on('skus')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('spec_id')->references('id')->on('specs')->onDelete('restrict')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sku_spec');
    }
};
