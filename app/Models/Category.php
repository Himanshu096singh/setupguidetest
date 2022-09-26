<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes; 

    protected $fillable = [
        'name', 'slug', 'image', 'icon', 'alt', 'status'
    ];

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    protected function slug(): Attribute
    {
        return new Attribute(
            set: fn ($value) =>  [
                'slug' => Str::slug($value),
            ]
        );
    }

    protected $dates = ['deleted_at'];

}
