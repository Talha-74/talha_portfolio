<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BanksDataTable;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BanksDataTable $dataTable)
    {
        return $dataTable->render('admin.bank.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bank.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'branch' => 'required',
            'opening_balance' => 'required'
        ]);

        Bank::create([
            'name' => $request->name,
            'branch' => $request->branch,
            'opening_balance' => $request->opening_balance
        ]);

        toastr()->success('Created Successfully');
        return redirect()->route('admin.bank.index');
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
    public function edit(Bank $bank)
    {
        return view('admin.bank.edit', ['bank' => $bank]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Bank $bank, Request $request)
    {
        $request->validate([
            'name'            => 'required',
            'branch'          => 'required',
            // 'opening_balance' => 'required'
        ]);

        $bank->update([
            'name'            => $request->name,
            'branch'          => $request->branch,
            // 'opening_balance' => $request->opening_balance

        ]);

        toastr()->success('Updated Successfully');
        return redirect()->route('admin.bank.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bank = Bank::find($id);
        if ($bank) {
            $bank->delete();
            return response()->json(['success' => 'Deleted successfully']);
        }
        return response()->json(['error' => 'Item not found'], 404);
    }
}
