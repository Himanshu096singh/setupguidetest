<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'url' ,'email', 'address', 'contact','logo','whitelogo ','fevicon','alt','index','fcontent','created_at','updated_at'
    ];
}
