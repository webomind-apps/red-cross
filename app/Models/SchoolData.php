<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolData extends Model
{
    use HasFactory;
    protected $fillable = [
        'dise_code',
        'school_name',
        'district',
        'taluk',
        'pin_code',
        'address',
        'email',
        'phone_number',
        'councellor_name',
        'councellor_phone',
        'councellor_email'
    ];

    public function school_registration()
    {
        return $this->hasMany(SchoolRegistration::class, 'school_id');
    }    
    public function balance()
    {
        return $this->hasMany(Balance::class, 'school_id');
    }    
}
