<?php

namespace App\Http\Controllers\API;

use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index() {
        return Store::all();
    }
    // 
    public function getByName(Request $request, $name) {
        // removing extra spacings in name
        $name = rtrim( Str::of($name)->replaceMatches('/ {2,}/', ' ') );
        // 
        return Store::where("name","like","%{$name}%")->get();
        // return Store::where("name", $name)->first();
    }
}
