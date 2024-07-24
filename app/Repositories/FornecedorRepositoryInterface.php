<?php

namespace App\Repositories;

interface FornecedorRepositoryInterface
{
    public function query();

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);

    public function find($id);
}
