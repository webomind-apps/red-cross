<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'dise_code',
        'school_name',
        'district',
        'taluk',
        'pin_code',
        'phone_number',
        'email',
        'address',
        'councellor_name',
        'councellor_email',
        'councellor_phone',
        'no_of_students_class_eight',
        'no_of_students_class_nine',
        'no_of_students_class_ten',
        'total_students',
        'school_registration_annual_fee',
        'school_student_memebership_fee',
        'no_of_students_paid',
        'total_fees',
        'paid_amount',
        'balance_amount',
        'total',
        'convenience',
        'total_to_be_paid',
    ];

    public function school_data()
    {
        return $this->belongsTo(SchoolData::class);
    }

    public function school_registration_fees()
    {
        return $this->hasMany(SchoolRegistrationFee::class, 'school_registration_id');
    }

    public function financial_year(){
        return $this->belongsTo(FinancialYear::class,'year_id');
    }
}
