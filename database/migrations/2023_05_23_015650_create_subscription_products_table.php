<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscription_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscription_plan_id');
            $table->unsignedBigInteger('product_id');
            $table->decimal('weight');
            $table->integer('count');

            $table->foreign('subscription_plan_id')
            ->references('id')
                ->on('subscription_plans');

            $table->foreign('product_id')
            ->references('id')
                ->on('products');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscription_products');
    }
};
