<?php

namespace App\Http\Controllers\API;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index() {
        
        return Customer::all();
    }
    // create
    public function create(Request $request) {

        $data = $request->validate([
            'wc_id' => 'required',
            'name' => 'required',
            'email' => 'required',
        ]);
        // 
        return Customer::create($data);
    }
}
