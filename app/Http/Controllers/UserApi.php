<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Response;

class UserApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_users = User::all();
        $total_user = $all_users->count();
        $transaction_count = Transactions::all()->count();
        $total_teller = $all_users->where('role', 'bank')->count();

        return response()->json([
            'success' => true,
            'users' => $all_users
        ]);
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
