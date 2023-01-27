<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'cover_image', 'summary', 'client_name', 'cover_image_original', 'typology_id' ];

    public function typology(){
        return $this->belongsTo(Typology::class);
    }

    public static function generateSlug($string){

        $slug = Str::slug($string, '-');

        $original_slug = $slug;

        $exists = Projects::where('slug', $slug)->first();

        $c = 1;

        while($exists){


            $slug = $original_slug . '-' . $c;
            $c++;

            $exists = Projects::where('slug', $slug)->first();


        }

        return $slug;

    }
}
