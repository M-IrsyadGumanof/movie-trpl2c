<?php

namespace App\Interfaces;

interface MovieRepositoryInterface
{
    public function getAll($search);
    public function find($id);
    public function store($data);
    public function update($id, $data);
    public function delete($id);
}
