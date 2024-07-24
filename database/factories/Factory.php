<?php

use Faker\Generator as Faker;
use Database\Factories\CnpjProvider;

$factory->define(App\Models\Fornecedor::class, function (Faker $faker) {
    $faker->addProvider(new CnpjProvider($faker));

    return [
        'cnpj' => $faker->cnpj,
        'nome' => $faker->company,
        'contato' => $faker->name,
        'endereco' => $faker->address,
    ];
});
