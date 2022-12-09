<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolRegistrationFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_fees',
        'year_id',
        'paid_amount',
        'balance_amount',
        'total',
        'convenience',
        'total_to_be_paid',
        'school_registration_id'
    ];

    public function school_registrations()
    {
        return $this->belongsTo(SchoolRegistration::class);
    }
}
