<?php

namespace App\Http\Controllers;

use App\Models\IncomeCategory;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function indexCategories(){
        $categories = [];

        if(count(IncomeCategory::get())> 0){
            $categories = IncomeCategory::get()->toQuery()->latest()->paginate(10);
        }

        return view('incomeCategories.index', compact('categories'));
    }

    public function categoryCreate(){
        return view('incomeCategories.create');
    }

    public function categoryDelete(IncomeCategory $incomeCategory){
        $incomeCategory->delete();

        return redirect(route('income-categories'))->with('success','Категорията беше изтрита успешно!');
    }

    public function editCategory(IncomeCategory $incomeCategory){
        return view('incomeCategories.edit', ['category' => $incomeCategory]);
    }

    public function categoryUpdate(Request $request, IncomeCategory $incomeCategory){
        $request->validate([
            'category' => 'required',
        ]);

        $incomeCategory->update(['name' => $request->category]);

        return redirect()->back()->with('success', 'Категорията за приход беше редактирана успешно!');
    }
    public function categoryStore(Request $request){
        $request->validate([
            'category' => 'required',
        ]);

        $category = IncomeCategory::create(['name' => $request->category]);

        return redirect(route('income-category.edit', ['incomeCategory' => $category->id]))->with('success', 'Категорията за приход беше създадена успешно!');
    }
}
