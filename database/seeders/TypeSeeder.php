<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Faker\Generator;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        $labels = ['Frontend', 'Backend', 'Fullstack', 'UI/UX', 'Design'];

        foreach ($labels as $label) {
            Type::create([
                'label' => $label,
                'color' => $faker->hexColor()
            ]);
        }
    }
}
