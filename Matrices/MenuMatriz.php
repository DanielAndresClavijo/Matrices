<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Indicador de menu animado - MagtimusPro</title>
    <link rel="stylesheet" href="css/popup.css">
    <link rel="stylesheet" href="css/estilos.css">
    <script language="JavaScript" type="text/javascript" src="js/ajax.js"></script>
</head>

<body>
    <canvas id="my-canvas" width="1500" height="950" style="position: absolute; display: inherit; z-index: 1;"></canvas>
    <h1 class="titulo">Menu Matrices Version 1.0</h1>
    <div class="overlay" id="crear" style="background: black;">
        <div class="popup" id="popup1">
            <a href="#" id="btn-cerrar-crear" class="btn-cerrar-popup">x<i class="fas fa-times"></i></a>
            <h3>Creacion De Nueva Matriz</h3>
            <p>Ingrese la dimension de la Matriz, recuerde que
                solo se permiten valores de 2 hasta 50.<br>
            <br>Ejemplo: Si ingresa 2, la dimension de la matriz sera de 2x2</p>
            <form action="">
                    <div class="contenedor-inputs">
                        <input type="number" min="2" max="50" name="cantR2" placeholder="Ingrese la dimension de la matriz" required >
                    </div>
                    <input type="submit" name="enviar2" class="btn-submit" value="Crear">
            </form>
        </div>
    </div>
    
        <?php
        if(isset($_REQUEST['enviar2']) && !empty($_REQUEST['cantR2'])){
            echo '<div id="muestra" class="muestra">';
            $cantR1 = $_REQUEST['cantR2'];//Cantidad de elementos del vector matriz
            echo "<h2>La dimension de la matriz es de ".$cantR1."x".$cantR1."</h2>";
            $ejeX = range( 1, $cantR1 );
            $ejeY = range( 1, $cantR1 );
            if(!empty($_REQUEST['Matriz'])){
                $ejesYX = unserialize($_REQUEST['Matriz']);
            }else{
                foreach ( $ejeY as $y ) {
                    foreach ( $ejeX as $x ) {
                        // Aquí creamos los ejes con un valor aleatorio
                        $ejesYX[ $y ][ $x ] = rand( 0, 1 );
                    }
                }
                session_start();
                /*session is started if you don't write this line can't use $_Session  global variable*/
                $_SESSION["matriz"]=serialize($ejesYX);
                $_SESSION["cantR1"]=$cantR1;   
            }
             
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

            $html .= '</table></div>';

            echo $html;
            echo '<nav class="menu" style="">
                    <a class="item" href="MenuRelaciones.php">Proceso de Relaciones</a>
                    <a class="item" href="MenuFunciones.php">Proceso de Funciones</a>
                    <a class="item" id="btn-abrir-crear">Crear y Reescribir Matriz</a>';
                    ?>
                    <form action="" class="actualizar">
                            <input type="hidden" value="<?php echo serialize($ejesYX); ?>">
                            <input type="hidden" value="<?php echo $cantR1; ?>" name="cantR2" >
                            <input type="submit" name="enviar2" class="item" value="Actualizar Matriz">
                    </form>
                        <?php
                    echo '<div class="back-menu"></div>
                </nav>';
        }else{
            echo '<div id="muestra" class="muestra"><h1>Aun no ha creado una matriz</h1></div>'
            . '<nav class="menu" style="">
                    <a class="item" id="btn-abrir-crear">Crear matriz</a>

                    <div class="back-menu"></div>
                </nav>';
        }
        ?> 
    
    <script src="js/popup.js"></script>
    <canvas id="my-canvas" width="1200" height="950"></canvas>
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
