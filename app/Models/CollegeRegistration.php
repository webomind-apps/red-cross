<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeRegistration extends Model
{
    use HasFactory;

  

    public function financial_year(){
        return $this->belongsTo(FinancialYear::class,'year_id');
    }
}
