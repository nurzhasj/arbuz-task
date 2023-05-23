<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('subscription_plan_id');
            $table->unsignedBigInteger('address_id');
            $table->string('delivery_day');
            $table->time('delivery_time');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('subscription_plan_id')
                ->references('id')
                ->on('subscription_plans');

            $table->foreign('address_id')
                ->references('id')
                ->on('addresses');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
