<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Simplex PT-3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        body
        {
            background-image: url('back.jpeg');
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="">
        <div class="col-md-12 mx-auto card text-center">
            
            <div class="container ">
               
                
              <!--
                   
                    <h3 class="col-md-2">
                        2
                    </h3>
                    <h3 class="col-md-2">
                        3
                    </h3>
                    <h3 class="col-md-2">
                        4
                    </h3>
                </div>    
                -->
                <?php
                
                require_once("funcoes.php");

                $vet = array();

                $qtd_x = @$_GET["qtd_x"];
                $qtd_f = @$_GET["qtd_f"];
        
                $total = $qtd_x + $qtd_f;
                $total += 1;
        
                $qtd_f += 1;
                $i = 0;
                $index = 0;
                while($i < $qtd_f)
                {
                    
                    if($i == 0)
                    {
                        $index++;
                    }
                    else
                    {
                        $index = 0;
                    }

                    echo "<div class=\"row mx-auto text-center\">";
                    
                    echo " <h6 class=\"col-md-1\">
                            $index
                        </h6>";
                        
                    $k = 1;
                    $vet[$i][$k - 1] = $index;
                    
                    while($k <= $total)
                    {
                        $valor = @$_GET['f'.$i.'x'.$k];
                        if($i == 0)
                        {
                            $valor = $valor * -1;
                            
                        }   

                        if($valor != "")
                        {
                            
                            echo " <h6 class=\"col-md-1\">
                                $valor
                            </h6>";
                            
                            $vet[$i][$k] = $valor;
                        }
                        else
                        {
                            if($k == $total)
                            {
                                
                                echo " <h6 class=\"col-md-1\">
                                        ".@$_GET['f'.$i.'res']."
                                    </h6>";
                                    
                                $vet[$i][$k] = @$_GET['f'.$i.'res'];
                            }
                            else
                            {
                                if($i == ($k - ($qtd_x)))
                                {
                                    echo " <h6 class=\"col-md-1\">
                                        1
                                    </h6>";
	                            $vet[$i][$k] = 1;
                                }
                                else
                                {
                                    echo " <h6 class=\"col-md-1\">
                                        0
                                    </h6>";
	                            $vet[$i][$k] = 0;
                                }
                            }
                            
                            
                        }
                        
                        //echo '<b>f'.$i.'x'.$k."</b>=".$valor."\n";
                        $k++;
                    }
                    echo "</div>";
                    //$res = @$_GET["f".$i."res"];
                    //echo '<b>f'.$i.'x'.$k."</b>=".$res."\n";
        
                    //echo "<br><br>";
        
                    $i++;
                }
                    

//		echo "total=".count($vet);
//		echo "total=".count($vet[0]);
		
        $i = 0;
        
		$qtd_linhas = count($vet);
        $qtd_colunas = count($vet[0]);
        /*
		while($i < $qtd_linhas)
		{
			$k = 0;
			while($k < $qtd_colunas)
			{
				echo "vet[".$i."][".$k."]=".$vet[$i][$k]."<br>";
				$k++;
			}
			echo "<br>";
			$i++;
        }
        */
		
        //echo "menor valor de Z=".min($vet[0])."\n<br>";
        
        echo "<br><br>---------------- PRIMEIRA ETAPA ------------------<br><br>";
        $index = array_search(min($vet[0]), $vet[0]);
        
        //$index2 = array_search(min($vet[0]), $vet[0]);
        //echo "index2=$index2<br>";

        $i = 1;
        
        $menor_valor = 0;
        $index_menor_valor = 0;
        $elemento_pivo = 0;

        while($i < $qtd_linhas)
        {
            $b = $vet[$i][count($vet[0]) - 1];
            $res = 0;
            if($vet[$i][$index] == 0)
            {
                $res = $vet[$i][$index];
            }
            else
            {
                $res = $b / $vet[$i][$index];
            }
            

            if($menor_valor == 0)
            {
                $menor_valor = $res;
            }
            if($res < $menor_valor)
            {
                $menor_valor = $res;
                $index_menor_valor = $i;
            }
            echo number_format($res,3)."<br>";
            $i++;
        }
        
        echo "menor_valor=$menor_valor<br>";
        echo "index_menor_valor=$index_menor_valor";
        $elemento_pivo = $vet[$index_menor_valor][$index];

        echo "<br><br>---------------- SEGUNDA ETAPA ------------------<br><br>";
        
        $i = 0;
        while($i < $qtd_colunas)
        {
            $res = $vet[$index_menor_valor][$i];
            //echo  number_format($res,3)." &nbsp&nbsp&nbsp&nbsp  ";
            $i++;
        }
        echo "<br>";
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
            echo number_format($res,3)." &nbsp&nbsp&nbsp&nbsp  ";
            $i++;
        }

        echo "<br><br>---------------- TERCEIRA ETAPA ------------------<br><br>";
        $i = 0;
        while($i < $qtd_linhas)
        {
            if($i != $index_menor_valor)
            {
                $res = $vet[$i][$index_menor_valor] * -1;
                echo "NUMEROS INVERTIDOS=".$res."<br>";
            }
            $i++;
        }
        echo "<br>";
        $i = 0;
        while($i < $qtd_linhas)
        {
            if($i != $index_menor_valor)
            {
                $valor = $vet[$i][$index_menor_valor] * -1;
                $k = 0;
                $nlp = gerar_nlp($elemento_pivo, $vet, $qtd_colunas,$index_menor_valor);

                while($k < $qtd_colunas)
                {
                    $res = $nlp[$k] * $valor;
                    $res2 = $res + $vet[$i][$k];
                    //echo "$res2=$res + ".$vet[$i][$k]."&nbsp&nbsp&nbsp&nbsp";
                    echo number_format($res2,3)." &nbsp&nbsp&nbsp&nbsp  ";
                    $k++;
                }
                echo "<br>";
            }
            else
            {
                $k = 0;
                $nlp = gerar_nlp($elemento_pivo, $vet, $qtd_colunas, $index_menor_valor);
                while($k < $qtd_colunas)
                {
                    $res = $nlp[$k];
                    echo  number_format($res,3)." &nbsp&nbsp&nbsp&nbsp  ";
                    $k++;
                }
            }
            $i++;
        }

        echo "<br><br><br>";

        ?>
        
                

            </div>

        </div>
    </div>

    


</body>
</html>
