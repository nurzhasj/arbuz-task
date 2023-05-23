<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

final class ProductCategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        ProductCategory::factory()->count(3)->create();
    }
}
