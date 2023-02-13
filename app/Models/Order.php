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
        'device_id',
        'order_number',
        'status',
        'order_date',
        'discount_total',
        'total_tax',
        'shipping_total',
        'total',
        'customer_id',
        'payment_method',
        'shipping_method',
        'billing_first_name',
        'billing_last_name',
        'billing_company',
        'billing_email',
        'billing_phone',
        'billing_address_1',
        'billing_address_2',
        'billing_city',
        'billing_state',
        'billing_postcode',
        'billing_country',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_company',
        'shipping_address_1',
        'shipping_address_2',
        'shipping_city',
        'shipping_state',
        'shipping_postcode',
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
            $data = [
                'status' => $order->status,
            ];
            // update order api 
            $order = WCOrder::update($order->wc_id, $data);
            // 
            return true;
        });
    }
}
