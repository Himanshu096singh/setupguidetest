<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Postfaq extends Model
{
    use HasFactory;
    protected $fillable = ['question','answer','post_id','created_at','updated_at'];
    // public function post(){
    //     return $this->belongsTo(Post::class);
    // }

    protected function question(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
        );
    }


}
 