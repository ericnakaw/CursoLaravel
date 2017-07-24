<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repositories\ClientRepository;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     *
     * @var ClientRepository 
     */
    private $repository;
    
    function __construct(ClientRepository $repository) {
        $this->repository = $repository;
    }

        public function index()
    {
    	return $this->repository->all();
    }

    public function store(Request $request)
    {
        dd($request->all());
        return $this->repository->create($request->all());
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

