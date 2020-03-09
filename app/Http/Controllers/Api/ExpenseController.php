<?php

namespace App\Http\Controllers\Api;

use App\Api\Models\Category;
use App\Api\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cost' => 'required|integer',
            'category_name' => 'required|string'
        ]);
        $category = Category::firstOrCreate(
            ['slug' => str_slug($request->category_name)],
            ['name' => $request->category_name]
        );

        $expense = new Expense([
            'user_id' => Auth::user()->id,
            'cost' => $request->cost,
            'category_id' => $category->id
        ]);

        $expense->save();

        return response()->json(['message' => 'expense created'], 201);
    }

    public function getExpenses()
    {
        return response()->json(Auth::user()->expenses, 200);
    }
}
