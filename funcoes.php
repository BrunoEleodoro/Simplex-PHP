<?php

    function gerar_nlp($elemento_pivo,$vet,$qtd_colunas,$linha_menor_valor)
    {
        $nlp = array();
        $i = 0;
        while($i < $qtd_colunas)
        { 
            $res = "";
            if($elemento_pivo == 0)
            {
                $res = $vet[$linha_menor_valor][$i];
            }
            else
            {
                $res = $vet[$linha_menor_valor][$i] / $elemento_pivo;
            }
            $nlp[$i] = $res;
            $i++;
        }
        return $nlp;
    }

    function resolver($qtd_colunas, $qtd_linhas, $vet)
    {
        $vet_novo = array();
        $index = array_search(min($vet[0]), $vet[0]);
        $coluna = array_search(min($vet[0]), $vet[0]);
    
        $i = 1;
        
        $menor_valor = 0;
        $linha_menor_valor = 0;
        $elemento_pivo = 0;
        //$coluna = 0;
        while($i < $qtd_linhas)
        {
            $b = $vet[$i][count($vet[0]) - 1];
            $res = 0;
            $elemento = $vet[$i][$index];
            if($elemento < 0)
            {
                $elemento = 0.0000000000125;
            }
            
            if($elemento == 0)
            {
                $res = $elemento;
            }
            else
            {
                $res = $b / $elemento;
                
            }

            if($menor_valor == 0)
            {
                $menor_valor = $res;
            }
            if($res < $menor_valor && $res > 0)
            {
                
                $menor_valor = $res;
                $linha_menor_valor = $i;
                $coluna = $index;
            }

            
            //echo number_format($res,3,",",".")."<br>";
            
            $i++;
        }
        if($linha_menor_valor == 0)
        {
            $linha_menor_valor = 1;
        }
        
        echo "menor_valor=$menor_valor<br>";
        echo "";
        $elemento_pivo = $vet[$linha_menor_valor][$index];

        echo "<br><br>---------------- SEGUNDA ETAPA ------------------<br><br>";
        
        $i = 0;
        echo "<b>Linha Pivo:</b> &nbsp";
        
        while($i < $qtd_colunas)
        {
            $res = $vet[$linha_menor_valor][$i];
            echo number_format($res,3,",",".")." &nbsp&nbsp&nbsp&nbsp  ";
            $i++;
        }
        echo "<br>";
        echo "<b>Nova Linha Pivo:</b> &nbsp";
        $nlp = array();
        $i = 0;
        while($i < $qtd_colunas)
        { 
            $res = "";
            if($elemento_pivo == 0)
            {
                $res = $vet[$linha_menor_valor][$i];
            }
            else
            {
                $res = $vet[$linha_menor_valor][$i] / $elemento_pivo;
            }
            $nlp[$i] = $res;
            echo number_format($res,3,",",".")." &nbsp&nbsp&nbsp&nbsp  ";
            $i++;
        }

        echo "<br><br>---------------- TERCEIRA ETAPA ------------------<br><br>";
        $i = 0;
        while($i < $qtd_linhas)
        {
            if($i != $linha_menor_valor)
            {
                $res = $vet[$i][$linha_menor_valor] * -1;
                echo "NUMEROS INVERTIDOS=".$res."<br>";
            }
            $i++;
        }
        echo "<br>";
        $i = 0;
        while($i < $qtd_linhas)
        {

            if($i != $linha_menor_valor)
            {
                
                
                $k = 0;
                $nlp = gerar_nlp($elemento_pivo, $vet, $qtd_colunas,$linha_menor_valor);

                while($k < $qtd_colunas)
                {
                    $valor = $vet[$i][$coluna] * -1;

                    $res = $nlp[$k] * $valor;
                    //echo $nlp[$k]." * $valor <br>";
                    $res2 = $res + $vet[$i][$k];
                    
                    $vet_novo[$i][$k] = $res2;
                    $k++;
                }
                echo "<br>";
            }
            else
            {
                $k = 0;
                $nlp = gerar_nlp($elemento_pivo, $vet, $qtd_colunas, $linha_menor_valor);
                while($k < $qtd_colunas)
                {
                    $res = $nlp[$k];
                    $vet_novo[$i][$k] = $res;
                    $k++;
                }
            }
            $i++;
        }

       $i = 0;
       //echo "<b><u>Z:</u></b>&nbsp ";
       
       for ($i=0; $i < $qtd_linhas; $i++) 
       { 
           echo "<b><u>".($i+1)."ª</b></u> :";
           for ($j=0; $j < $qtd_colunas; $j++) 
           {     
                echo number_format($vet_novo[$i][$j],3)." &nbsp&nbsp&nbsp&nbsp  ";
           }
           
           echo "<br>";
       }

        
        $i = 0;
        $k = 0;

        return $vet_novo;
    }

?>