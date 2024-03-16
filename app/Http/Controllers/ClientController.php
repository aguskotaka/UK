<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::all();
        return view('client',compact('clients'));
    }

    public function store(Request $request)
    {
        $client = $request->validate([
            'client_name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);

        Client::create($client);

        return redirect()->route('client.index');
    }

    public function update(Request $request, $id)
    {
        $client = $request->validate([
            'client_name'=> 'string',
            'address'=> 'string',
            'phone'=> 'numeric',
        ]);

        Client::findOrFail($id)->update($client);


        return redirect()->route('client.index');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('client.index');
    }
}
