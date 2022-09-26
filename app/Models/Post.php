<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'image', 'alt','category_id','description ','metatitle','metakeywords','metadescription','status','created_at','updated_at','deleted_at'
    ];

    public function category(){
        return $this->belongsto(Category::class);
    }

    public function company(){
        return $this->belongsto(Company::class);
    }

    public function product(){
        return $this->belongsto(Product::class);
    }

    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }

    public function faq(){
        return $this->hasMany(Postfaq::class);
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
        );
    }

    // protected function status(): Attribute
    // {
    //     return Attribute::make(
    //         get : fn ($value) => ($value) != TRUE ? "Active" : "Deactive",
    //     );
    // }

}
