<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CostCategory extends Model
{
    use HasFactory;

    protected $table = "cost_categories";

    protected $fillable = ['name'];

    public function costs($month, $year){
        return $this->hasMany(Cost::class,'','id')->whereYear('created_at', '=', $year)
        ->whereMonth('created_at', '=', $month)
        ->get();

    }

    public function allCosts()
    {
        return $this->hasMany(Cost::class);
    }
}
