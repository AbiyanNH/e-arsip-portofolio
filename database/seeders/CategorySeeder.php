<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'Surat Masuk',
            'slug' => 'surat-masuk'
        ]);

        Category::create([
            'name' => 'Surat Undangan',
            'slug' => 'surat-undangan'
        ]);
    }
}