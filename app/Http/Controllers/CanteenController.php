<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use App\Models\Transactions;
use Illuminate\Http\Request;

class CanteenController extends Controller
{
    public function __construct()
    {
        $this->middleware('role.kantin');
    }

    public function index()
    {
        $all_products = Products::all();
        $categories = Category::all();
        

        return view('kantin.index', compact('all_products', 'categories'));
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
        $name = $request->name;
        $price = $request->price;
        $stock = $request->stock;
        $photo = $request->photo;
        $description = $request->description;
        $category = $request->category;
        $stand = $request->stand;

        Products::create([
            'name' => $name,
            'price' => $price,
            'stock' => $stock,
            'photo' => $photo,
            'description' => $description,
            'category_id' => $category,
            // 'stand' => $stand
        ]);

        return redirect()->back();
    }

    public function accIndex()
    {
        $all_transaction = Transactions::with('user')->get();

        return view('kantin.transaction', compact('all_transaction'));
    }

    public function takeOrder($id)
    {
        $transaction = Transactions::find($id);

        // dd($transaction);
        $transaction->update([
            "status" => "diambil"
        ]);

        return redirect()->back();
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Products::find($id);
        $categories = Category::all();

        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Products::find($id);
        // Update the product's attributes with the data from the request
        $product->update($request->all());

        return redirect()->route('kantin')->with('success', 'Product updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::find($id);

        $product->delete();

        return redirect()->route('kantin')->with('success');
    }
}
