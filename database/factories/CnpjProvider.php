<?php

namespace Database\Factories;

use Faker\Provider\Base;

class CnpjProvider extends Base
{
    public function cnpj()
    {
        $cnpj = str_pad(rand(1, 99999999000000), 14, '0', STR_PAD_LEFT);
        return preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $cnpj);
    }
}

