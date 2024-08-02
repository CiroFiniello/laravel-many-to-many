<?php

namespace Database\Seeders;
use App\Models\Type;
use App\Models\types;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Mockery\Matcher\Type as MatcherType;
use Nette\Schema\Elements\Type as ElementsType;
use Nette\Utils\Type as UtilsType;

// use Mockery\Matcher\Type;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $typesName = [
            "Web Development",
            "Application Security",
            "News",
            "IT",
            "Networks",
            "Operating Systems",
            "Gaming",
            "Devops",
            "Database",
            "Front-end",
            "Back-end",
            "Full-stack",

        ];
        foreach ($typesName as $typeName) {
            $type = new \App\Models\types();
            $type->name = $typeName;
            $type->color = $faker->unique()->safeHexColor();
            $type->save();
        }
    }
}
