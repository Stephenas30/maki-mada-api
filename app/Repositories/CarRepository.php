<?php

namespace App\Repositories;
use App\Models\Car;
use App\Interfaces\CarRepositoryInterface;
class CarRepository implements CarRepositoryInterface
{
    public function index(){
        return Car::all();
    }

    public function getById($voiture_id){
       return Car::findOrFail($voiture_id);
    }

    public function store(array $data){
       return Car::create($data);
    }

    public function update(array $data,$voiture_id){
       return Car::where('voiture_id', $voiture_id)->update($data);
    }
    
    public function delete($voiture_id){
       Car::destroy($voiture_id);
    }
}