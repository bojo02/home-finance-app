<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use App\Models\CostCategory;
use Illuminate\Http\Request;

class CostController extends Controller
{
    public function indexCategories(){
        $categories = [];

        if(count(CostCategory::get())> 0){
            $categories = CostCategory::get()->toQuery()->latest()->paginate(10);
        }

        return view('costCategories.index', compact('categories'));
    }

    public function categoryCreate(){
        return view('costCategories.create');
    }

    public function categoryDelete(CostCategory $costCategory){

        foreach($costCategory->allCosts as $cost){
            $cost->delete();
        }

        $costCategory->delete();

        return redirect(route('cost-categories'))->with('success','Категорията беше изтрита успешно!');
    }

    public function editCategory(CostCategory $costCategory){
        return view('costCategories.edit', ['category' => $costCategory]);
    }

    public function categoryUpdate(Request $request, CostCategory $costCategory){
        $request->validate([
            'category' => 'required',
        ]);

        $costCategory->update(['name' => $request->category]);

        return redirect()->back()->with('success', 'Категорията за разход беше редактирана успешно!');
    }
    public function categoryStore(Request $request){
        $request->validate([
            'category' => 'required',
        ]);

        $category = CostCategory::create(['name' => $request->category]);

        return redirect(route('cost-category.edit', ['costCategory' => $category->id]))->with('success', 'Категорията за разход беше създадена успешно!');
    }

    public function index(){
        $costs = [];

        if(count(Cost::get())> 0){
            $costs = Cost::get()->toQuery()->latest()->paginate(10);
        }

        return view('costs.index', compact('costs'));
    }

    public function search(CostCategory $costCategory, $month, $year){
        $costs = $costCategory->costs($month, $year)->paginate(10);

        if(!count($costs) > 0){
            return back()->with('wrong', 'Не бяха открити разходи...');
        }

        return view('costs.search', compact('costs', 'costCategory'));
    }

    public function create(){
        $categories = CostCategory::get();

        return view('costs.create', ['categories' => $categories]);
    }

    public function store(Request $request){
        $request->validate([
            'amount' => 'required|integer',
            'note' => 'required',
            'category_id' => 'required',
        ]);

        $cost = Cost::create([
            'amount' => $request->amount,
            'note' => $request->note,
            'cost_category_id'=> $request->category_id,
        ]);

        return redirect(route('cost.edit', ['cost' => $cost->id]))->with('success','Разходът беше създаден успешно!');
    }

    public function edit(Cost $cost){
        $categories = CostCategory::get();

        return view('costs.edit', ['cost' => $cost, 'categories' => $categories]);
    }

    public function update(Request $request, Cost $cost){
        $request->validate([
            'amount' => 'required|integer',
            'note' => 'required',
            'category_id' => 'required',
        ]);

        $cost->update([
            'amount' => $request->amount,
            'note' => $request->note,
            'cost_category_id'=> $request->category_id,
        ]);

        return back()->with('success','Разходът беше редактиран успешно!');
    }

    public function delete(Cost $cost){
        $cost->delete();

        return redirect(route('costs'))->with('success', 'Разходът беше изтрит успешно!');
    }
}
