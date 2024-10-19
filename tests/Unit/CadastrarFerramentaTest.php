<?php

namespace Tests\Unit;

use App\Controllers\CadastrarFerramenta;
use PHPUnit\Framework\TestCase;

class CadastrarFerramentaTest extends TestCase
{
    public function testCadastrarFerramenta()
    {
        $cadastro = new CadastrarFerramenta();

        $resultado = $cadastro->cadastrarFerramenta("Esmerilhadeira", "Beach Club", "Pralok");
       
        $this->assertTrue($resultado);
    }
}