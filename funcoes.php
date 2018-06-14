<?php

    function gerar_nlp($elemento_pivo,$vet,$qtd_colunas,$index_menor_valor)
    {
        $nlp = array();
        $i = 0;
        while($i < $qtd_colunas)
        { 
            $res = "";
            if($elemento_pivo == 0)
            {
                $res = $vet[$index_menor_valor][$i];
            }
            else
            {
                $res = $vet[$index_menor_valor][$i] / $elemento_pivo;
            }
            $nlp[$i] = $res;
            $i++;
        }
        return $nlp;
    }

?>