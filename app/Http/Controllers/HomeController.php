<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Transactions;
use App\Models\Wallets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $wallets = Wallets::where('user_id', Auth::user()->id)->get();
        $credit = 0;
        $debit = 0;


        foreach ($wallets as $wallet) {
            $credit += $wallet->credit;
            $debit += $wallet->debit;
        }

        $saldo = $credit - $debit;

        $all_product = Products::all();

        $carts = Transactions::where('status', 'dikeranjang')->get();
        $total_biaya = 0;
        foreach ($carts as $cart) {
            $total_price = $cart->price * $cart->quantity;
            $total_biaya += $total_price;
        }
        $mutasi = Wallets::where('user_id', Auth::user()->id)->orderby('created_at', 'DESC')->get();


        return view('home', compact('saldo', 'all_product', 'carts', 'total_biaya','mutasi'));
    }
}
