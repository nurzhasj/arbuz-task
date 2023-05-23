<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('inventories', function (Blueprint $table) {
            $table->decimal('weight')->nullable()->change();
            $table->integer('quantity')->nullable()->change();
            $table->decimal('product_weight')->nullable();
            $table->decimal('per_unit_price')->nullable();
            $table->decimal('total_price');
        });
    }

    public function down(): void
    {
        Schema::table('inventories', function (Blueprint $table) {
            $table->decimal('weight')->change();
            $table->integer('quantity')->change();
            $table->dropColumn('product_weight');
            $table->dropColumn('per_unit_price');
            $table->dropColumn('total_price');
        });
    }
};
