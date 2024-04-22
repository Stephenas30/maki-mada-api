<?php

namespace App\Repositories;

use App\Models\Image;
use App\Interfaces\ImageRepositoryInterface;

class ImageRepository implements ImageRepositoryInterface
{
    public function index(){
        return Image::all();
    }

    public function getById($id_img){
       return Image::findOrFail($id_img);
    }

    public function store(array $data){
       return Image::create($data);
    }

    public function update(array $data,$id_img){
       return Image::whereId($id_img)->update($data);
    }
    
    public function delete($id_img){
       Image::destroy($id_img);
    }
}
