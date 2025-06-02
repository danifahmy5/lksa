<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;

class ExpenseCategoryController extends Controller
{
    public function index()
    {
        $categories = ExpenseCategory::all();
        return view('expense_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('expense_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        ExpenseCategory::create($request->only('name'));
        return redirect()->route('expense-categories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = ExpenseCategory::findOrFail($id);
        return view('expense_categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category = ExpenseCategory::findOrFail($id);
        $category->update($request->only('name'));
        return redirect()->route('expense-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = ExpenseCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('expense-categories.index')->with('success', 'Category deleted successfully.');
    }
}
