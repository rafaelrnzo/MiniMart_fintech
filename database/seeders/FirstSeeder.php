<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Products;
use App\Models\Students;
use App\Models\TopUp;
use App\Models\Transactions;
use App\Models\User;
use App\Models\Wallets;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Tenizen bank',
            'username' => 'bank',
            'password' => Hash::make('bank'),
            'role' => 'bank'
        ]);
        User::create([
            'name' => 'Tenizen mart',
            'username' => 'kantin',
            'password' => Hash::make('kantin'),
            'role' => 'kantin'
        ]);
        User::create([
            'name' => 'rl',
            'username' => 'rl',
            'password' => Hash::make('rl'),
            'role' => 'siswa'
        ]);
        Students::create([
            'user_id' => 4,
            'nis' => 12345,
            'classroom' => 'XII RPL'

        ]);

        Category::create([
            'name' => 'Makanan'
        ]);
        Category::create([
            'name' => 'Minuman'
        ]);
        Category::create([
            'name' => 'Snack'
        ]);

        Products::create([
            'name' => 'Risol', 
            'price' => 3000,
            'stock' => 100,
            'photo' => 'https://umroh.com/blog/wp-content/uploads/2020/03/cara-membuat-risoles-source-pixabay-770x515.png',
            'description' => 'enak',
            'category_id' => 3,
            'stand' => 1
        ]);
        Products::create([
            'name' => 'es teh', 
            'price' => 3000,
            'stock' => 10,
            'photo' => 'https://assalamfresh.com/wp-content/uploads/2023/03/es-teh-jawa.jpg',
            'description' => 'enak',
            'category_id' => 2,
            'stand' => 2
        ]);
        Products::create([
            'name' => 'bakso', 
            'price' => 10000,
            'stock' => 50,
            'photo' => 'https://cdn0-production-images-kly.akamaized.net/VTDiAj5ffuLCm1CEjR9VExObwkQ=/1200x675/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/2763419/original/071857300_1553761217-shutterstock_1148354906.jpg',
            'description' => 'enak',
            'category_id' => 1,
            'stand' => 1
        ]);
        Products::create([
            'name' => 'Nasi Uduk', 
            'price' => 10000,
            'stock' => 50,
            'photo' => 'https://cdn1-production-images-kly.akamaized.net/KUMtCMB4LiYMDP30ZIA_ZwanZzw=/1x60:700x454/640x360/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/3264167/original/045475800_1602402228-1212646998.jpg',
            'description' => 'enak',
            'category_id' => 1,
            'stand' => 1
        ]);
        Products::create([
            'name' => 'Nasi Bakar', 
            'price' => 8000,
            'stock' => 50,
            'photo' => 'https://shopee.co.id/inspirasi-shopee/wp-content/uploads/2022/01/Resep-nasi-bakar-ayam-sederhana.webp',
            'description' => 'enak',
            'category_id' => 1,
            'stand' => 1
        ]);
        Wallets::create([
            "user_id" => 4,
            "credit" => 100000,
            // "description" => "pembukaan buku rekening",
            "status" => "pending"
        ]);
        Transactions::create([
            "user_id" => 4,
            "product_id" => 3,
            "status" => "dikeranjang",
            "order_id" => "INV_12345",
            "price" => 10000,
            "quantity" => 2
        ]);
        
        $transactions = Transactions::where('order_id', 'INV_12345');
        $total_debit = 0;

        foreach($transactions as $transaction){
            $total_price = $transaction->price * $transaction->quantity;
            $total_debit = $total_price;
        }

        Wallets::create([
            "user_id" => 4,
            "debit" => $total_debit,
            // "description" => "pembelian p roduk"
        ]);

        foreach($transactions as $transaction){
            Transactions::find($transaction->id)->update([
                "status" => "dibayar"
            ]);
        }

        TopUp::create([
            "user_id" => 4,
            "transaction_id" => 'TRF_2103109012',
            "value" => 10000
        ]);
    }
}
