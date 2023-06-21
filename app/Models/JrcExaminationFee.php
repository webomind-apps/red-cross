<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JrcExaminationFee extends Model
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
        'total_no_of_students',
        'jrc_examination_fee',
        'total_fee_amount',
        'no_of_students_buying_book',
        'book_fee',
        'total_book_fee',
        'total',
        'convenience',
        // 'convenience_amount',
        'total_to_be_paid',
        'mode_of_payment',
        'payment_method',
        'transaction_date'
    ];
}
