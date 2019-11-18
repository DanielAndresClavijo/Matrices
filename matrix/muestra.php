<?php
    session_start();
    /*session is started if you don't write this line can't use $_Session  global variable*/
    if(!empty($_POST['cantR1'])){
        $cantR1 = $_POST['cantR1'];//Cantidad de elementos del vector matriz
        $_SESSION["cantR1"]=$cantR1; 
        echo "<h2>La dimension de la matriz es de ".$cantR1."x".$cantR1."</h2>";
        $ejeX = range( 1, $cantR1 );
        $ejeY = range( 1, $cantR1 );
        foreach ( $ejeY as $y ) {
            foreach ( $ejeX as $x ) {
                // AquÃ­ creamos los ejes con un valor aleatorio
                $ejesYX[ $y ][ $x ] = rand( 0, 1 );
            }
        }
        /*session is started if you don't write this line can't use $_Session  global variable*/
        $_SESSION["matriz"]=serialize($ejesYX);
        $_SESSION["cantR1"]=$cantR1;   

        echo "<p>Esta es la matriz creada<p><br>";
        // Creamos la tabla
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

        $html .= '</table>';

        echo $html;
        echo '';
    }else{
        $cantR1 = $_SESSION["cantR1"]; 
        $ejesYX = unserialize($_SESSION["matriz"]);
        echo "<h2>La dimension de la matriz es de ".$cantR1."x".$cantR1."</h2>";
        $ejeX = range( 1, $cantR1 );
        $ejeY = range( 1, $cantR1 );

        echo "<p>Esta es la matriz creada<p><br>";
        // Creamos la tabla
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

        $html .= '</table>';

        echo $html;
        echo '';
    }
    
    

