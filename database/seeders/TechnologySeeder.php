<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $technologies = [
            ['name' => 'Laravel'],
            ['name' => 'Vue.js'],
            ['name' => 'React'],
            ['name' => 'Angular'],
            ['name' => 'Node.js'],
            ['name' => 'Python'],
            ['name' => 'Django'],
            ['name' => 'Flask'],
            ['name' => 'Ruby on Rails'],
            ['name' => 'ASP.NET'],
        ];

        foreach ($technologies as $technology) {
            Technology::create($technology);
        }
    }
}
