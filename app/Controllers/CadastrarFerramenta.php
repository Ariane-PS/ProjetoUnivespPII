<?php

namespace App\Controllers;

use App\Models\Repository\FerramentaRepository;

class CadastrarFerramenta
{
    public function cadastrarFerramenta(string $ferramenta, string $obra, string $loja)
    {

        $cadFerramenta = new FerramentaRepository();

        if ($cadFerramenta->cadastrarFerramenta($ferramenta, $obra, $loja)) {
            return true;
        } else {
            return false;
        }
    }
}
