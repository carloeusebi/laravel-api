<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $DIR = 'project_images';
        Storage::makeDirectory($DIR);

        $type_ids = Type::pluck('id')->toArray();
        $type_ids[] = null; //add a null element to have some Project without a relation

        $tech_ids = Technology::pluck('id')->toArray();

        // creates 10 records
        for ($i = 0; $i < 10; $i++) {
            $project = Project::create([
                'name' => $faker->words(3, true),
                'type_id' => $type_ids[array_rand($type_ids)],
                'thumbnail' => "$DIR/" . $faker->image(storage_path("app/public/$DIR"), 250, 250, fullPath: false),
                'description' => $faker->paragraph(10),
                'url' => $faker->url(),
                'github_url' => $faker->url(),
            ]);

            foreach ($tech_ids as $tech_id) {
                $dice = rand(1, 4); // 25% chance;
                if ($dice === 4) {
                    $project->technologies()->attach($tech_id);
                }
            }
        }
    }
}
