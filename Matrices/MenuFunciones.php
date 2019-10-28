<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu Relaciones</title>
    <link rel="stylesheet" href="css/popup.css">
    <link rel="stylesheet" href="css/estilos.css" >
    <script language="JavaScript" type="text/javascript" src="js/ajax.js"></script>
</head>
<body>
    <canvas id="my-canvas" width="1200" height="950"></canvas>
    <h1 class="titulo">Menu Relaciones de Matrices Versi&oacute;n 1.0</h1>
    <?php
    session_start();
    /*session is started if you don't write this line can't use $_Session  global variable*/
    $ejesYX = unserialize($_SESSION["matriz"]);
    $cantR1 = $_SESSION["cantR1"];
    $aux=array();
    for($i=1;$i<=$cantR1;$i++){//Recorrer las filas
        $aux[$i] = 0;
        for($j=1;$j<=$cantR1;$j++){//Recorrer las columnas
            if($ejesYX[$i][$j]==1){
                $aux[$i]=$aux[$i]+1;
            }
        }
    }
    $cont = 0;
    for($i=1;$i<=$cantR1;$i++){//Recorrer las filas
        if($aux[$i]>=1){
            $cont++;
        } 
    }
    
    if($cont == $cantR1){
        $aux1=array();
        for($i=1;$i<=$cantR1;$i++){//Recorrer las filas
            $aux1[$i] = 0;
            for($j=1;$j<=$cantR1;$j++){//Recorrer las columnas
                if($ejesYX[$j][$i]==1){
                    $aux1[$i]=$aux1[$i]+1;
                }
            }
        }
        $cont1 = 0;
        $cont2 = 0;
        for($i=1;$i<=$cantR1;$i++){//Recorrer las filas
            if($aux1[$i]>=1){
                $cont1++;
            } 
            if($aux[$i]<=1){
                $cont2++;
            }
        }
        $_SESSION["sobre"]=$cont1;
        $_SESSION["inye"]=$cont2;
        ?><nav class="menu" style="">
            <a class="item" href="javascript:Solicitud('paginas/Inyectiva.php','pagina');">Inyectiva</a>
            <a class="item" href="javascript:Solicitud('paginas/Sobreyectiva.php','pagina');">Sobreyectiva</a>
            <a class="item" href="javascript:Solicitud('paginas/Biyectiva.php','pagina');">Biyectiva</a>
            <form action="MenuMatriz.php" method="POST">
                <input type="hidden" value="<?php echo $cantR1; ?>" name="cantR2" >
                <input type="hidden" value="<?php echo serialize($ejesYX); ?>" name="Matriz" >
                <input style=" 
                        height: 46px;
                        position: relative;
                        z-index: 10;
                        background: #2bff0d;
                        border: 0;
                        text-align: center;
                        font-size: 18px;
                        line-height: 46px;
                        cursor: pointer;
                        line-height: normal;
                        overflow: hidden;
                        padding: 0 20px;
                        margin-left: 19%;
                        cursor: pointer;
                        color: white;
                        font-family: sans-serif;
                        display: block;
                        -webkit-user-select: none; /* for button */
                         -webkit-appearance: none; /* for input */
                          -moz-user-select: none;
                           -ms-user-select: none;
                        " type="submit" name="enviar2" class="btn-submit" value="Volver al Menu">
            </form>
            
        </nav>
        <div class="muestra" id="pagina">Cargando p&aacute;gina</div>
        <?php

                }else{
                    ?>
                        <nav class="menu" style="">
                           <form action="MenuMatriz.php" method="POST">
                            <input type="hidden" value="<?php echo $cantR1; ?>" name="cantR2" >
                            <input type="hidden" value="<?php echo serialize($ejesYX); ?>" name="Matriz" >
                            <input style=" 
                                    height: 46px;
                                    position: relative;
                                    z-index: 10;
                                    background: #2bff0d;
                                    border: 0;
                                    text-align: center;
                                    font-size: 18px;
                                    line-height: 46px;
                                    cursor: pointer;
                                    line-height: normal;
                                    overflow: hidden;
                                    padding: 0 20px;
                                    margin-left: 19%;
                                    cursor: pointer;
                                    color: white;
                                    font-family: sans-serif;
                                    display: block;
                                    -webkit-user-select: none; /* for button */
                                     -webkit-appearance: none; /* for input */
                                      -moz-user-select: none;
                                       -ms-user-select: none;
                                    " type="submit" name="enviar2" class="btn-submit" value="Volver al Menu">
                           </form>
                        </nav>
                    <?php
                    echo '<div id="muestra" class="muestra">';
                        $ejeX = range( 1, $cantR1 );
                        $ejeY = range( 1, $cantR1 );
                        echo "<h3 style=' text-align: center;'>No es Funcion</h3><br>";
                    // Dibujo de la matriz
                        $html = '<table border style="text-align: center; width: 100%;">';
                        $html .= '<th style="background: white; color: white;"></th>';

                        // Para crear las columnas X ( $ejeX = 1 a 10 )
                        foreach ( $ejeX as $col_X ) {

                          $html .= '<th style="background: black; color: white;">'.$col_X.'</th>';
                        }
                        $i=1;
                        $j=1;
                        foreach ( $ejesYX as $col_Y => $valores ) {

                          $html .= '<tr ">';
                          // Para crear las columnas Y ( $ejeY = 1 a 10 )
                          $html .= '<td style="background: black; "><b style="color: white;">'.$col_Y.'</b></td>';

                          foreach ( $valores as $val ) {
                            // Creamos los campos de los valores
                              if($i == $j){
                                  $html .= '<td style="background: grey;"><h4>'.$val.'</h4></td>';
                                  $j++;
                              }else{
                                  $html .= '<td style="background: white;"><h4>'.$val.'</h4></td>';
                                  $j++;
                              }

                          }
                          $i++;
                          $j=1;
                          $html .= '</tr>';
                        }

                        $html .= '</table></div>';

                        echo $html;
                    // Fin dibujo de matriz 
        echo '</div>';
    }
        ?> 
    
    
    
    
    <script src="js/matrixRain.js"></script>
    <script>
      //Iniciamos
      matrixRain({
          canvas: '#my-canvas',
          speed: 50,
          fontSize: 10,
          content: [1,0]
      }).run();
    </script>
</body>
</html>
