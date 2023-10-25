<?php

namespace App\Http\Controllers;

use App\Models\TopUp;
use App\Models\Transactions;
use App\Models\User;
use App\Models\Wallets;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function __construct()
    {
        $this->middleware('role.bank');
    }
    public function index()
    {
        $banks = Wallets::with("user")->orderBy('created_at', 'desc')->get();
        $filtered_bank = $banks->except(['debit']);
        $nasabah = User::where('role', 'siswa')->count();
        $transaction_count = Wallets::with('user')->where('status', 'pending')->count();
        $wallet_count = Wallets::with('user')->where('status', 'success')->count(); 

        return view('bank.index', compact('banks','nasabah','wallet_count','transaction_count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
