<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {

            $project = new Project();
            $project->title = $faker->realText(50);
            $project->cover_image = $faker->imageUrl(360, 360, 'project', true);
            // $project->cover_image = 'placeholders/' . $faker->image('public/storage/placeholders', category: 'projects', fullPath: false);
            $project->slug = Str::slug($project->title, '-');
            $project->description = $faker->realText();
            $project->github = $faker->url();
            $project->link = $faker->url();
            $project->save();
        }
    }
}
