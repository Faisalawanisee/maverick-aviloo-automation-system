<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index() {
        
        return Order::all();
    }
    // create
    public function create(Request $request) {

        $data = $request->validate([
            'wc_id' => 'required',
            'customer_id' => 'required',
            'device_id' => 'required',
            'order_number' => 'required',
            'order_date' => 'required',
            'status' => 'required',
            'shipping_total' => 'required',
            'shipping_tax_total' => 'required',
            'fee_total' => 'required',
            'discount_total' => 'required',
            'order_total' => 'required',
            'order_currency' => 'required',
            'payment_method' => 'required',
            'shipping_method' => 'required',
            'billing_first_name' => 'required',
            'billing_last_name' => 'required',
            'billing_company' => 'required',
            'billing_email' => 'required',
            'billing_phone' => 'required',
            'billing_address_1' => 'required',
            'billing_address_2' => 'required',
            'billing_postcode' => 'required',
            'billing_city' => 'required',
            'billing_state' => 'required',
            'billing_country' => 'required',
            'shipping_first_name' => 'required',
            'shipping_last_name' => 'required',
            'shipping_company' => 'required',
            'shipping_address_1' => 'required',
            'shipping_address_2' => 'required',
            'shipping_postcode' => 'required',
            'shipping_city' => 'required',
            'shipping_state' => 'required',
            'shipping_country' => 'required',
        ]);
        // create order
        $order = Order::create($data);
        // 
        if($order) {
            $customer_data = $request->validate([
                'wc_id' => $data->customer_id,
                'first_name' => $data->billing_first_name,
                'last_name' => $data->billing_last_name,
                'email' => $data->billing_email,
            ]);
            Customer::create($customer_data);
        }
        // 
        return $order;
    }
}
