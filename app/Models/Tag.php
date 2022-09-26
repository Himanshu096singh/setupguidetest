<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    public function posts(){
        return $this->morphedByMany(Post::class, 'taggable');
    }
    protected $fillable = [
        'name', 'slug'
    ];
    protected function slug(): Attribute{
        return new Attribute(
            set: fn ($value) => [
                'slug' => Str::slug($value)
            ]
            );
    } 

}
