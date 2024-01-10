<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Character extends Model
{
    use HasFactory;
    public function race(){
        return $this->belongsTo(Race::class);
    }
    public function skills(){
        return $this->belongsToMany(Skill::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'name',
        'slug',
        'race_id',
        'user_id',
        'height',
        'weight',
        'background',
        'picture',
        'armor_class',
        'for',
        'des',
        'cos',
        'int',
        'sag',
        'car',
        'price',
    ];

    public static function generateSlug($name){
        $slug = Str::slug($name, "-");
        $original_slug = $slug;
        $exists = Character::where("slug", $slug)->first();
        $c = 1;
        while($exists){
            $slug = $original_slug . "-" . $c;
            $exists = Character::where("slug", $slug)->first();

            $c++;
        }
        return $slug;
    }
}
