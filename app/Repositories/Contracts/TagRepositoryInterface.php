<?php

namespace App\Repositories\Contracts;

interface TagRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function searchByName(string $name);
}