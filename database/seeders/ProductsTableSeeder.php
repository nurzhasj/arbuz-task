<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

final class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory()->count(10)->create();
    }
}
