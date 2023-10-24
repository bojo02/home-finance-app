<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use App\Models\IncomeCategory;

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

    public function index(){
        $incomes = [];

        if(count(Income::get())> 0){
            $incomes = Income::get()->toQuery()->latest()->paginate(10);
        }

        return view('incomes.index', compact('incomes'));
    }

    public function create(){
        $categories = IncomeCategory::get();

        return view('incomes.create', ['categories' => $categories]);
    }

    public function store(Request $request){
        $request->validate([
            'amount' => 'required|integer',
            'note' => 'required',
            'category_id' => 'required',
        ]);

        $income = Income::create([
            'amount' => $request->amount,
            'note' => $request->note,
            'income_category_id'=> $request->category_id,
        ]);

        return redirect(route('income.edit', ['income' => $income->id]))->with('success','Приходът беше създаден успешно!');
    }

    public function edit(Income $income){
        $categories = IncomeCategory::get();

        return view('incomes.edit', ['income' => $income, 'categories' => $categories]);
    }

    public function update(Request $request, Income $income){
        $request->validate([
            'amount' => 'required|integer',
            'note' => 'required',
            'category_id' => 'required',
        ]);

        $income->update([
            'amount' => $request->amount,
            'note' => $request->note,
            'income_category_id'=> $request->category_id,
        ]);

        return back()->with('success','Приходът беше редактиран успешно!');
    }

    public function delete(Income $income){
        $income->delete();

        return redirect(route('incomes'))->with('success', 'Прихода беше изтрит успешно!');
    }
}
