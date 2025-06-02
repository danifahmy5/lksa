<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Donor;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomes = Income::with('donor')->get();
        return view('incomes.index', compact('incomes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $donors = Donor::all();
        return view('incomes.create', compact('donors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'donor_id' => 'nullable|exists:donors,id',
            'amount' => 'required|numeric',
            'source' => 'required|string',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);
        $income = Income::create($validated);
        return redirect()->route('incomes.index')->with('success', 'Income created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $income = Income::with('donor')->findOrFail($id);
        return view('incomes.show', compact('income'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $income = Income::findOrFail($id);
        $donors = Donor::all();
        return view('incomes.edit', compact('income', 'donors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $income = Income::findOrFail($id);
        $validated = $request->validate([
            'donor_id' => 'nullable|exists:donors,id',
            'amount' => 'required|numeric',
            'source' => 'required|string',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);
        $income->update($validated);
        return redirect()->route('incomes.index')->with('success', 'Income updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $income = Income::findOrFail($id);
        $income->delete();
        return redirect()->route('incomes.index')->with('success', 'Income deleted successfully.');
    }
}
