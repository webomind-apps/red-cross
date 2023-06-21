<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeBalance extends Model
{
    use HasFactory;

    public function college()
    {
        return $this->belongsTo(CollegeData::class);
    }

    public function financial_year()
    {
        return $this->belongsTo(FinancialYear::class,'year_id');
    }
}

