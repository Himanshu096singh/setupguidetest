<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $fillable= [
        'name','slug','image','company_id','category_id','description','alt','status','metatitle','metakeywords','metadescription'
    ];
     
    protected function slug(): Attribute{
        return new Attribute(
            set: fn ($value) => [
                'slug' => Str::slug($value)
            ]
            );
    }

    public function category(){
        return $this->belongsto(Category::class);
    }
    public function company(){
        return $this->belongsto(Company::class);
    }

    public function faqs(){
        return $this->hasMany(Productfaq::class);
    }

    
}
