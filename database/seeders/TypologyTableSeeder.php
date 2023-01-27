<?php

namespace Database\Seeders;

use App\Models\Typology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['HTML', 'CSS', 'JavaScript', 'PHP', 'Python'];

        foreach($data as $item){
            $new_type = new Typology();
            $new_type->name = $item;
            $new_type->slug = Str::slug($item);
            $new_type->save();
        }
    }
}
