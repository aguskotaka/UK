<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Client;
use App\Models\Product;
use App\Models\SalesDetails;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        $sales = Sale::OrderBy('created_at', 'desc')->get();
        $sales = Sale::paginate(2);
        $clients = Client::all();
        $products = Product::all();
        $sales_details = SalesDetails::all();
        return view('sales',compact('sales','clients','products','sales_details'));
    }

    public function store(Request $request)
    {

        $sales = $request->validate([
            'sales_date' => 'required|date_format:Y-m-d',
            'id_client' => 'required|exists:clients,id',
        ]);

        Sale::create($sales);


        return redirect()->route('sales_detail')->with('success', 'Sale created successfully!');
    }
    public function update(Request $request,$id)
    {

        $sales = $request->validate([
            'sales_date' => 'required|date_format:Y-m-d',
            'id_client' => 'required|exists:clients,id',
        ]);

        Sale::findOrFail($id)->update($sales);


        return redirect()->route('sales.index')->with('success', 'Sale created successfully!');
    }

    public function destroy($id)
    {
        $sales = Sale::findOrFail($id);
        $sales->delete();

        return redirect()->route('sales.index')->with('success','Sale deleted');
    }

    public function add_product(Request $request)
    {
        $data = $request->validate([
            'id_sale' => 'required|exists:sales,id',
            'id_product' => 'required|exists:products,id',
            'total_product' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($data['id_product']);

        if($product->stock < $data['total_product']){
            return redirect()->back()->with('error','Not enough stock');
        }

        $sub_total = $product->product_price * $data['total_product'];

        SalesDetails::create([
            'id_sale'=> $data['id_sale'],
            'id_product'=> $data['id_product'],
            'total_product'=> $data['total_product'],
            'sub_total' => $sub_total,
        ]);

        $sale = Sale::findOrFail($data['id_sale']);
        $sale->total_price += $sub_total;
        $sale->save();

        $product->stock -= $data['total_product'];
        $product->save();

        return redirect()->back()->with('success', 'Product added to sale successfully.');
    }

    public function cancel($id)
    {
        $sales_detail = SalesDetails::findOrFail($id);

        $sub_total = $sales_detail->sub_total;

        $sale = Sale::findOrFail($sales_detail->id_sale);
        $sale->total_price -= $sub_total;
        $sale->save();

        $sales_detail->delete();

        return redirect()->back()->with('succes','Success');

    }

    public function finish(Request $request)
    {
        $saleId = $request->input('sale_id');

        // Retrieve the sale record
        $sale = Sale::findOrFail($saleId);

        // Check if total_price is blank or zero
        if (empty($sale->total_price) || $sale->total_price == 0) {
            // Delete the sale
            $sale->delete();

            return redirect()->route('sales')->with('success', 'Sale deleted because total price is blank or zero.');
        } else {
            // Redirect to some other route or perform other action
            return redirect()->route('sales.index')->with('success', 'Sale completed successfully.');
        }
    }

}
