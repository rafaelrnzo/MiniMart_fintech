<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $all_products = Products::all();

        return response()->json([
            'message' => "Success get data",
            "data" => $all_products
        ],200);
    }
}
