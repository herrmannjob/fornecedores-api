<?php

namespace App\Repositories;

use App\Models\Fornecedor;

class FornecedorRepository implements FornecedorRepositoryInterface
{
    public function query()
    {
        return Fornecedor::query();
    }

    public function create(array $data)
    {
        return Fornecedor::create($data);
    }

    public function update($id, array $data)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->update($data);
        return $fornecedor;
    }

    public function delete($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        return $fornecedor->delete();
    }

    public function find($id)
    {
        return Fornecedor::findOrFail($id);
    }
}
