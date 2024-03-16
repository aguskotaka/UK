<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SalesDetails;
use Illuminate\Http\Request;

class SalesDetailsController extends Controller
{
    public function index(Request $request)
    {
        $sales = Sale::all();
        $products = Product::all();
        $sales_details = SalesDetails::all();
        return view('sales_detail',compact('sales','products','sales_details'));
    }
}
