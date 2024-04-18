<?php

namespace App\Repositories;
use App\Models\Client;
use App\Interfaces\ClientRepositoryInterface;
class ClientRepository implements ClientRepositoryInterface
{
    public function index(){
        return Client::all();
    }

    public function getById($client_id){
       return Client::findOrFail($client_id);
    }

    public function store(array $data){
       return Client::create($data);
    }

    public function update(array $data,$client_id){
       return Client::where('client_id', $client_id)->update($data);
    }
    
    public function delete($client_id){
       Client::destroy($client_id);
    }
}