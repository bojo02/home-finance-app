<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeCategory extends Model
{
    use HasFactory;

    protected $table = "income_categories";

    protected $fillable = ['name'];

    public function incomes($month, $year){
        return $this->hasMany(Income::class,'','id')->whereYear('created_at', '=', $year)
        ->whereMonth('created_at', '=', $month)
        ->get();

    }
}
