<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use App\Models\IncomeCategory;
use App\Models\CostCategory;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function dashboard(Request $request){
        $months = [
            'january' => 1,
            'february' => 2,
            'march' => 3,
            'april' => 4,
            'may' => 5,
            'june' => 6,
            'july' => 7,
            'august' => 8,
            'september' => 9,
            'october' => 10,
            'november' => 11,
            'december' => 12,
        ];

        $year = date('Y');

        if(isset($request->year)){
            $year = $request->year;
        }

        
                    

        $incomeCategories = IncomeCategory::get();

        $costCategories = CostCategory::get();

        return view("home", compact("incomeCategories", "costCategories", 'months', 'year'));
    }
}
