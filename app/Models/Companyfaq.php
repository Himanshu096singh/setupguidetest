<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companyfaq extends Model
{
    use HasFactory;

    
    protected function question(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
        );
    }
    
}
