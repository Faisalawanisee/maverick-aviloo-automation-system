<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'wc_id',
        'name',
        'email',
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
