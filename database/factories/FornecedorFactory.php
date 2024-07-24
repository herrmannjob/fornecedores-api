<?php

namespace Database\Factories;

use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

class FornecedorFactory extends Factory
{
    protected $model = Fornecedor::class;

    public function definition()
    {
        $faker = FakerFactory::create();
        $faker->addProvider(new \Database\Factories\CnpjProvider($faker));

        return [
            'cnpj' => $faker->cnpj,
            'nome' => $faker->company,
            'contato' => $faker->name,
            'endereco' => $faker->address,
        ];
    }
}

