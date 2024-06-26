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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',150);
            $table->text('description');
            $table->float('cost');
            $table->float('price');
            $table->float('stock');
            $table->unsignedBigInteger('subcategory_id')->index();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->cascadeOnDelete()->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
