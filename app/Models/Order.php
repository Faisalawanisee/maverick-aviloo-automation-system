<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Codexshaper\WooCommerce\Facades\Order as WCOrder;
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
            // dd($order->status);
            
            $data = [
                // 'device_id' => $order->device_id,
                // 'order_date' => $order->order_date,
                'status' => $order->status,
                // 'shipping_total' => $order->shipping_total,
                // 'shipping_tax_total' => $order->shipping_tax_total,
                // 'discount_total' => $order->discount_total,
                // 'order_total' => $order->order_total,
                // 'order_currency' => $order->order_currency,
                // 'payment_method' => $order->payment_method,
                // 'shipping_method' => $order->shipping_method,
                // 'billing_first_name' => 'New Bikeersss',
                // 'billing_last_name' => $order->billing_last_name,
                // 'billing_company' => $order->billing_company,
                // 'billing_email' => $order->billing_email,
                // 'billing_phone' => $order->billing_phone,
                // 'billing_address_1' => $order->billing_address_1,
                // 'billing_address_2' => $order->billing_address_2,
                // 'billing_postcode' => $order->billing_postcode,
                // 'billing_city' => $order->billing_city,
                // 'billing_state' => $order->billing_state,
                // 'billing_country' => $order->billing_country,
                // 'shipping_first_name' => $order->shipping_first_name,
                // 'shipping_last_name' => $order->shipping_last_name,
                // 'shipping_company' => $order->shipping_company,
                // 'shipping_address_1' => $order->shipping_address_1,
                // 'shipping_address_2' => $order->shipping_address_2,
                // 'shipping_postcode' => $order->shipping_postcode,
                // 'shipping_city' => $order->shipping_city,
                // 'shipping_state' => $order->shipping_state,
                // 'shipping_country' => $order->shipping_country,
            ];

            $order = WCOrder::update($order->wc_id, $data);

            Log::emergency($order);
            // 
            return true;
        });
    }
}
