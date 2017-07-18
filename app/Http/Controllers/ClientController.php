<?php

namespace CodeProject\Http\Controllers;

use Illuminate\Http\Request;
use CodeProject\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
    	return Client::all();
    }

    public function store(Request $request)
    {
    	return Client::create($request->all());
    }

    public function show($id)
    {
    	return Client::find($id);
    }

    public function destroy($id)
    {
    	Client::find($id)->delete();
    }

    public function update(Request $request, $id)
    {
    	$client = Client::find($id);
    	logger($request->all());
    	$client->fill($request->all());
    	$client->save();
    }
}

