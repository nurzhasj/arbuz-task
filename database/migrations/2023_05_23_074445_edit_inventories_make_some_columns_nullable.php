<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('subscription_products', function (Blueprint $table) {
            $table->decimal('weight')->nullable()->change();
            $table->integer('count')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('inventories', function (Blueprint $table) {
            $table->decimal('weight')->change();
            $table->integer('count')->change();
        });
    }
};
