<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    private array $technologies = [
        'Python' => '#3572A5',
        'JavaScript' => '#F1E05A',
        'Java' => '#007396',
        'C++' => '#00599C',
        'Ruby' => '#701516',
        'PHP' => '#4F5D95',
        'Swift' => '#FFAC45',
        'Go' => '#00ADD8',
        'Rust' => '#DEA584',
        'Kotlin' => '#F18E33'
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->technologies as $label => $color) {
            Technology::create([
                'label' => $label,
                'color' => $color,
            ]);
        }
    }
}
