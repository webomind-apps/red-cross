<?php

namespace App\Http\Controllers;

use App\Models\MasterPrice;
use App\Models\SchoolData;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
    public function jrc_exam_form()
    {
        return view('frontend.jrc-exam');
    }
    public function data(Request $request )
    {
        $data = SchoolData::where('dise_code', $request->dise)->first();
        return response()->json($data);
    }
    public function master_price_data()
    {
        $data = MasterPrice::first();
        return response()->json($data);
    }
}
