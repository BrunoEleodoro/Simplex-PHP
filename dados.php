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
                    /*
                    echo " <h6 class=\"col-md-1\">
                            $index
                        </h6>";
                        */
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
                            /*
                            echo " <h6 class=\"col-md-1\">
                                $valor
                            </h6>";
                            */
                            $vet[$i][$k - 1] = $index;
                        }
                        else
                        {
                            if($k == $total)
                            {
                                /*
                                echo " <h6 class=\"col-md-1\">
                                        ".@$_GET['f'.$i.'res']."
                                    </h6>";
                                    */
                                $vet[$i][$k - 1] = @$_GET['f'.$i.'res'];
                            }
                            else
                            {
                                if($i == ($k - ($qtd_x)))
                                {
                                    echo " <h6 class=\"col-md-1\">
                                        1
                                    </h6>";
                                }
                                else
                                {
                                    echo " <h6 class=\"col-md-1\">
                                        0
                                    </h6>";
                                }
                            }
                            
                            
                        }
                        
                        //echo '<b>f'.$i.'x'.$k."</b>=".$valor."\n";
                        $k++;
                    }
                    echo "</div>";
                    $res = @$_GET["f".$i."res"];
                    //echo '<b>f'.$i.'x'.$k."</b>=".$res."\n";
        
                    //echo "<br><br>";
        
                    $i++;
                }
                    
            ?>
        
                

            </div>

        </div>
    </div>

    


</body>
</html>