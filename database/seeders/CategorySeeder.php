<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Complete Wedding Package',
            'Photography',
            'Catering Services',
            'Master of Ceremonies',
            'Hair and Makeup',
            'Wedding Planners / Coordinators',
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name]);
        }
    }
}
