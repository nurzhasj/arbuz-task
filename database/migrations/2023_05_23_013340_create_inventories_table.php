<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->primary();
            $table->decimal('weight');
            $table->integer('quantity');

            $table->foreign('product_id')
            ->references('id')
                ->on('products');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
