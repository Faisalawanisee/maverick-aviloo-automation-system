<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'wc_id',
        'customer_id',
        'device_id',
        'order_number',
        'order_date',
        'status',
        'shipping_total',
        'shipping_tax_total',
        'discount_total',
        'order_total',
        'order_currency',
        'payment_method',
        'shipping_method',
        'billing_first_name',
        'billing_last_name',
        'billing_company',
        'billing_email',
        'billing_phone',
        'billing_address_1',
        'billing_address_2',
        'billing_postcode',
        'billing_city',
        'billing_state',
        'billing_country',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_company',
        'shipping_address_1',
        'shipping_address_2',
        'shipping_postcode',
        'shipping_city',
        'shipping_state',
        'shipping_country',
    ];

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

            // dd($order);

            $response = Http::delete('http://test-woocommerce.test/wp-json/wc/v3/orders/'.$order->id);

            Log::emergency($response);
            // $response = Http::put('http://test-woocommerce.test/wp-json/wc/v3/orders/'.$order->id, $order);

            return true;
        });
    }
}
