<?php

namespace App\Models\Repository;

use App\Models\Services\DbConnection;
use PDO;


class FerramentaRepository extends DbConnection
{

    /**
     * Método para cadastrar usuário no banco de dados
     * @param string 
     * @param string 
     * @return bool
     */
    public function cadastrarFerramenta(string $ferramenta, string $obra, $loja): bool
    {
     
        $query_cad_ferramenta = "INSERT INTO ferramentas (ferramenta, obra, loja) VALUES (:ferramenta, :obra, :loja)";

       
        $cad_ferramenta = $this->getConnection()->prepare($query_cad_ferramenta);

       
        $cad_ferramenta->bindValue(':ferramenta', $ferramenta, PDO::PARAM_STR);
        $cad_ferramenta->bindValue(':obra', $obra, PDO::PARAM_STR);
        $cad_ferramenta->bindValue(':loja', $loja, PDO::PARAM_STR);

       
        if ($cad_ferramenta->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
