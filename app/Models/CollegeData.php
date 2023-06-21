<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeData extends Model
{
    use HasFactory;

    protected $fillable = [
        'dise_code',
        'college_name',
        'college_type',
        'district',
        'taluk',
        'pin_code',
        'address',
        'email',
        'phone_number',
        'councellor_name',
        'councellor_phone',
        'councellor_email',
    ];

    public function balances()
    {
        return $this->hasMany(Balance::class, 'school_id');
    } 
    
    public function college_registration()
    {
        return $this->hasMany(CollegeRegistration::class, 'school_id');
    }   
}
