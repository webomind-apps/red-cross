<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'from_date',
        'to_date',
        'status',
        'comment'
    ];

   public function balances(){
        return $this->hasMany(Balance::class,'year_id');
    }
    public function registrations(){
        return $this->hasMany(SchoolRegistration::class,'year_id');
    }
    public function registration_fees(){
        return $this->hasMany(SchoolRegistrationFee::class,'year_id');
    }

    public function college_balances(){
        return $this->hasMany(CollegeBalance::class,'year_id');
    }
    public function college_registrations(){
        return $this->hasMany(CollegeRegistration::class,'year_id');
    }
    public function college_registration_fees()
    {
        return $this->hasMany(CollegeRegistrationFee::class, 'year_id');
    }
}
