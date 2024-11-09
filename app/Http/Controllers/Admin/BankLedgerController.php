<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\BankLedger;
use Illuminate\Http\Request;

class BankLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.bankLedger.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $banks = Bank::all();
        return view('admin.bankLedger.create', ['banks' => $banks]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Bank $bank)
    {
        // Validate incoming request
        $request->validate([
            'description' => 'required',
            'amount' => 'required',
            'type' => 'required',
        ]);

        // Fetch the bank by ID
        $bank = Bank::findOrFail($request->bank_id);
// dd($bank);
        // Calculate the balance for this entry
        $lastLedger = BankLedger::where('bank_id', $bank->id)->latest()->first();
        // dd($lastLedger);
        $currentBalance = $lastLedger ? $lastLedger->balance : $bank->opening_balance;

        // Handle debit check
        if ($request->type === 'debit' && $request->amount > $currentBalance) {
            return back()->withErrors(['amount' => 'Insufficient balance for this debit entry.']);
        }

        // Calculate the new balance
        $newBalance = $request->type === 'credit'
            ? $currentBalance + $request->amount
            : $currentBalance - $request->amount;

        // Create the ledger entry
        BankLedger::create([
            'bank_id' => $bank->id,
            'description' => $request->description,
            'amount' => $request->amount,
            'type' => $request->type,
            'balance' => $newBalance,
        ]);

        return redirect()->back()->with('success', 'Ledger entry created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
