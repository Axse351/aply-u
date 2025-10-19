<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $categories = Category::all();

        // pastikan ada kategori dulu
        if ($categories->count() == 0) {
            $this->call(CategorySeeder::class);
            $categories = Category::all();
        }

        for ($i = 0; $i < 30; $i++) {
            Job::create([
                'title' => $faker->jobTitle(),
                'company' => $faker->company(),
                'location' => $faker->city(),
                'description' => $faker->paragraph(4, true),
                'category_id' => $categories->random()->id,
            ]);
        }
    }
}
