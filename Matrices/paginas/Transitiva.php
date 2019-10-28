<?php
    session_start();
    /*session is started if you don't write this line can't use $_Session  global variable*/
    $ejesYX = unserialize($_SESSION["matriz"]);
    $cantR1 = $_SESSION["cantR1"];
    $ejeX = range( 1, $cantR1 );
    $ejeY = range( 1, $cantR1 );
    echo "<h3 style=' text-align: center;'>Esta es la matriz original</h3><br>";
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

//El siguiente for es para convertir la matriz en transpuesta
    for($i=1;$i<=$cantR1;$i++){//Recorrer las filas
        for($j=1;$j<=$cantR1;$j++){//Recorrer las columnas
                $R1[$i][$j]=$ejesYX[$j][$i];	
        }
    }
 
//El siguiente for es para sacar el producto matricial
    for($i=1;$i<=$cantR1;$i++){//Recorrer las filas
        for($j=1;$j<=$cantR1;$j++){//Recorrer las columnas
            for($y=1;$y<=$cantR1;$y++){//Recorrer las columnas
                if($ejesYX[$i][$y]==1 && $ejesYX[$i][$y]==$R1[$j][$y]){
                        $R2[$i][$j]=1;
                        $y=$cantR1;
                }else{
                        $R2[$i][$j]=0;

                }	
            }	
        }
    }
    echo "<br><h3 style=' text-align: center;'>Esta es el producto matricial</h3><br>";
// Dibujo de la matriz
    $html = '<table border style="text-align: center; width: 100%;">';
    $html .= '<th style="background: white; color: white;"></th>';

    // Para crear las columnas X ( $ejeX = 1 a 10 )
    foreach ( $ejeX as $col_X ) {

      $html .= '<th style="background: black; color: white;">'.$col_X.'</th>';
    }

    $i=1;
    $j=1;
    foreach ( $R2 as $col_Y => $valores ) {

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
    
    $cont = 0;
    for($i=1;$i<=$cantR1;$i++){//Recorrer las filas
        for($j=1;$j<=$cantR1;$j++){//Recorrer las columnas
            if($R2[$i][$j]== $ejesYX[$i][$j]){
                $cont++; 
            }
        }
    }
    echo '<br>';
    if($cont==$cantR1*$cantR1){
        echo '<h3 style=" text-align: center;">******LA MATRIZ ES TRANSITIVA******</h3>';
    }else{
        echo '<h3 style=" text-align: center;">******LA MATRIZ NO ES TRANSITIVA******</h3>';
    }
?>
 
