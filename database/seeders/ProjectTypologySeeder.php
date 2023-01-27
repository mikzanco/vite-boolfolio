<?php

namespace Database\Seeders;

use App\Models\Projects;
use App\Models\Typology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = Projects::all();
        foreach($projects as $project){
            $typology_id = Typology::inRandomOrder()->first()->id;
            $project->typology_id = $typology_id;
            $project->update();
        }
    }
}
