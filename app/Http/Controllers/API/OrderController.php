<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use App\Models\Customer;
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
            'order_number' => 'required',
            'status' => 'required',
            'order_date' => 'required',
            'discount_total' => 'required',
            'total_tax' => 'required',
            'shipping_total' => 'required',
            'total' => 'required',
            'customer_id' => 'required',
            'customer_name' => 'required',
            'customer_email' => 'required',
            'payment_method' => 'required',
            'shipping_method' => 'nullable',
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
            'shipping_first_name' => 'nullable',
            'shipping_last_name' => 'nullable',
            'shipping_company' => 'nullable',
            'shipping_address_1' => 'nullable',
            'shipping_address_2' => 'nullable',
            'shipping_postcode' => 'nullable',
            'shipping_city' => 'nullable',
            'shipping_state' => 'nullable',
            'shipping_country' => 'nullable',
        ]);

        $data['device_id'] = 1;

        // create customer
        $customer_data = array(
            'name' => $data['customer_name'],
            'email' => $data['customer_email'],
        );
        $customer = Customer::updateOrCreate(['wc_id' => $data['customer_id']], $customer_data);
        // create order
        $order = Order::updateOrCreate(['wc_id' => $data['wc_id']], $data);
        // 
        return $order;
    }
}
