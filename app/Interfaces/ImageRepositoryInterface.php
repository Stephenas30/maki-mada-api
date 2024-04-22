<?php

namespace App\Interfaces;

interface ImageRepositoryInterface
{
    public function index();
    public function getById($id_img);
    public function store(array $data);
    public function update(array $data,$id_img);
    public function delete($id_img);
}
