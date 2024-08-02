<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = \App\Models\types::all()->pluck("id");
        for ($i=0; $i <100 ; $i++) {
            $newProject = new Project();
            $newProject->type_id = $faker->randomElement($types);
            $newProject->title= $faker->realText(40);
            $newProject->author= $faker->name();
            $newProject->content= $faker->realText(1000);
            $newProject->date= $faker->dateTimeThisMonth();
            $newProject->image= $faker->imageUrl(400,250, 'posts');
            $newProject->save();
        }
    }
}
