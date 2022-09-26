<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name', 'slug', 'image', 'alt','category_id', 'headquarter', 'ceo','founder','insceptiondate','mosthearedbrand','totalassets','companynumber','history','marketshareimage','marketshare','competitoranalysis','metatitle','metakeywords','metadescription','status','type','created_at','updated_at','deleted_at'
    ];

    protected function slug(): Attribute{
        return new Attribute(
            set: fn ($value) => [
                'slug' => Str::slug($value)
            ]
            );
    } 

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function faqs(){
        return $this->hasMany(Companyfaq::class);
    }
}



