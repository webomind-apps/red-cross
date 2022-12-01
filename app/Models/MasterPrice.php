<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'pricing_level',
        'price',
    ];
}
