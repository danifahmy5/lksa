<?php

namespace App\Http\Controllers;

use App\Models\CashFlow;
use App\Models\Bank;
use Illuminate\Http\Request;

class CashFlowController extends Controller
{
    public function index()
    {
        $cashFlows = CashFlow::with('bank')->latest()->paginate(10);
        return view('admin.cash_flows.index', compact('cashFlows'));
    }

    public function create()
    {
        $banks = Bank::all();
        return view('admin.cash_flows.create', compact('banks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bank_id' => 'required|exists:banks,id',
            'type' => 'required|in:in,out',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);
        CashFlow::create($validated);
        return redirect()->route('cash-flows.index')->with('success', 'Cash flow created successfully.');
    }

    public function edit(CashFlow $cashFlow)
    {
        $banks = Bank::all();
        return view('admin.cash_flows.edit', compact('cashFlow', 'banks'));
    }

    public function update(Request $request, CashFlow $cashFlow)
    {
        $validated = $request->validate([
            'bank_id' => 'required|exists:banks,id',
            'type' => 'required|in:in,out',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);
        $cashFlow->update($validated);
        return redirect()->route('cash-flows.index')->with('success', 'Cash flow updated successfully.');
    }

    public function destroy(CashFlow $cashFlow)
    {
        $cashFlow->delete();
        return redirect()->route('cash-flows.index')->with('success', 'Cash flow deleted successfully.');
    }
}
