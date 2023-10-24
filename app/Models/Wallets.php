<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallets extends Model
{
    protected $fillable = [
        "user_id",
        "debit",
        "credit",
        "status",
        "description"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
