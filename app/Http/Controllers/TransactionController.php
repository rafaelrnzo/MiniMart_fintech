<?php

namespace App\Http\Controllers;

use App\Models\TopUp;
use App\Models\Transactions;
use App\Models\Wallets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function addToCart(Request $request)
    {

        $user_id = $request->user_id;
        $product_id = $request->product_id;
        $status = 'dikeranjang';
        $price = $request->price;
        $quantity = $request->quantity;

        Transactions::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'status' => $status,
            'price' => $price,
            'quantity' => $quantity,
        ]);

        return redirect()->back()->with('status', 'Berhasil menambah keranjang');
    }

    public function payNow()
    {
        $status = 'dibayar';
        $order_id = 'INV_' . Auth::user()->id . date('YmdHis');

        $carts = Transactions::where('user_id', Auth::user()->id)->where('status', 'dikeranjang')->get();
        $total_debit = 0;

        foreach ($carts as $cart) {
            $total_price = $cart->price * $cart->quantity;
            $total_debit += $total_price;
        }

        Wallets::create([
            'user_id' => Auth::user()->id,
            'debit' => $total_debit,
            'description' => 'pembelian produk',
        ]);

        foreach ($carts as $cart) {
            Transactions::find($cart->id)->update([
                'status' => $status,
                'order_id' => $order_id
            ]);
        }

        return redirect()->back()->with('status', 'Berhasil membayar');
    }

    public function topUpSuccess($id)
    {
        $wallet = Wallets::find($id);

        $wallet->update([
            "status" => "success"
        ]);

        return redirect()->back();
    }

    public function topUp(Request $request)
    {
        $user = Auth::user()->id;

        Wallets::create([
            "user_id" => $user,
            "credit" => $request->credit,
            "status" => "pending"
        ]);

        return redirect()->back();
        // $status = 'top up';
        // $user = Auth::user();
        // $amount = $request->input('amount');

        // $wallet = Wallets::where('user_id', $user->id)->first();
        // $currentCredit = $wallet->credit;

        // $updateCredit = $currentCredit + $amount;
        // $wallet->update([
        //     'credit' => $updateCredit
        // ]);

        // TopUp::create([
        //     'user_id' => $user->id,
        //     'amount' => $amount,
        // ]);

        // return redirect()->back()->with('status', 'berhasil top up');


    }

    public function download($order_id)
    {
        $transactions = Transactions::where('order_id', $order_id)->get();
        $total_biaya = 0;

        foreach ($transactions as $transaction) {
            $total_price = $transaction->price * $transaction->quantity;
            $total_biaya = $total_price;
        }

        return view('user.receipt', compact('transactions', 'total_biaya'));
    }
}
