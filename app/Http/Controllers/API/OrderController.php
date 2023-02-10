<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index() {
        
        return Order::all();
    }
    // create
    public function create(Request $request) {

        // Log::emergency($request->wc_id);
        // die();

        // $data = $request->validate([
        //     // 'wc_id' => 'required',
        //     // 'device_id' => 'required',
        //     'order_number' => 'required',
        //     'order_date' => 'required',
        //     'status' => 'required',
        //     'shipping_total' => 'required',
        //     'shipping_tax_total' => 'required',
        //     'discount_total' => 'required',
        //     'order_total' => 'required',
        //     'order_currency' => 'required',
        //     'payment_method' => 'required',
        //     // 'shipping_method' => 'required',
        //     'customer_id' => 'required',
        //     'customer_name' => 'required',
        //     'customer_email' => 'required',
        //     'billing_first_name' => 'required',
        //     'billing_last_name' => 'required',
        //     'billing_company' => 'required',
        //     'billing_email' => 'required',
        //     'billing_phone' => 'required',
        //     'billing_address_1' => 'required',
        //     'billing_address_2' => 'required',
        //     'billing_postcode' => 'required',
        //     'billing_city' => 'required',
        //     'billing_state' => 'required',
        //     'billing_country' => 'required',
        //     // 'shipping_first_name' => 'required',
        //     // 'shipping_last_name' => 'required',
        //     // 'shipping_company' => 'required',
        //     // 'shipping_address_1' => 'required',
        //     // 'shipping_address_2' => 'required',
        //     // 'shipping_postcode' => 'required',
        //     // 'shipping_city' => 'required',
        //     // 'shipping_state' => 'required',
        //     // 'shipping_country' => 'required',
        // ]);

        $data = array (
            'wc_id' => '107',
            'order_number' => '107',
            'order_date' => '2023-02-10 14:55:21',
            'status' => 'on-hold',
            'shipping_total' => '0',
            'shipping_tax_total' => '0.00',
            'discount_total' => '0.00',
            'order_total' => '15.00',
            'order_currency' => 'DZD',
            'payment_method' => 'cod',
            'shipping_method' => NULL,
            // 'device_id' => '1',
            'customer_id' => '1',
            'customer_name' => 'admin',
            'customer_email' => 'hassankhan.infinitewise@gmail.com',
            'billing_first_name' => 'Ali1',
            'billing_last_name' => 'Testing',
            'billing_company' => 'FAbmedia',
            'billing_email' => 'ali1@tst.io',
            'billing_phone' => '322555',
            'billing_address_1' => 'johar townn',
            'billing_address_2' => 'muslim towner',
            'billing_postcode' => '5400',
            'billing_city' => 'lahore',
            'billing_state' => 'PB',
            'billing_country' => 'PK',
            'shipping_first_name' => NULL,
            'shipping_last_name' => NULL,
            'shipping_company' => NULL,
            'shipping_address_1' => NULL,
            'shipping_address_2' => NULL,
            'shipping_postcode' => NULL,
            'shipping_city' => NULL,
            'shipping_state' => NULL,
            'shipping_country' => NULL,
        );

        // Log::emergency($request);
        // die();


        // Log::emergency($request);
        // // Log::emergency($data);
        // die();
        // dd($data);
        // create order
        $order = Order::create($data);
        // Log::emergency($order);
        // die();
        // 
        if($order) {
            // $customer_data = $request->validate([
            //     'wc_id' => $data['customer_id'],
            //     'name' => $data['customer_name'],
            //     'email' => $data['customer_email'],
            // ]);
            $customer_data = array(
                'wc_id' => $data['customer_id'],
                'name' => $data['customer_name'],
                'email' => $data['customer_email'],
            );
            Customer::create($customer_data);
        }
        // 
        Log::emergency($order);
        return $order;
    }
}
