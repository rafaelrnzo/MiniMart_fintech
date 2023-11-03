<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('role.admin');
    }
    public function index()
    {
        $all_users = User::all();
        $total_user = $all_users->count();
        $transaction_count = Transactions::all()->count();
        $total_teller = $all_users->where('role', 'bank')->count();

        return view('admin.index', compact('all_users','total_user','total_teller','transaction_count'));
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $role = $request->role;
        $password = $request->password;

        User::create([
            'name' => $name,
            'email' => $email,
            'role' => $role,
            'password' => Hash::make($password)
        ]);

        return redirect()->back();
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->update($request->all());

        return redirect()->back();
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back();
    }
}
