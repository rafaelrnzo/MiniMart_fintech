<?php

namespace App\Http\Controllers;

use App\Models\Wallets;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function topUp(){
        Wallets::create('wallets', function (Blueprint $table){

        });
    }
}
