<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['wc_id'];

    protected $casts = [
        'order_date' => 'date'
    ];
    

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
    // 
    protected static function boot()
    {
        parent::boot();

        static::updating(function($order) {

            dd($order);

            $response = Http::put('http://wp-test.test/wp-json/wc/v3/orders/'.$order->id, $order);

            return true;
        });
    }
}
