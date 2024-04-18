<?php

namespace App\Interfaces;

interface ClientRepositoryInterface
{
    public function index();
    public function getById($client_id);
    public function store(array $data);
    public function update(array $data,$client_id);
    public function delete($client_id);
}