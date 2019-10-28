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
    ?>
    <nav class="menu" style="">
            <a class="item" href="javascript:Solicitud('paginas/Reflexiva.php','pagina');">Reflexiva</a>
            <a class="item" href="javascript:Solicitud('paginas/Simetrica.php','pagina');">Simetrica</a>
            <a class="item" href="javascript:Solicitud('paginas/Antisimetrica.php','pagina');">Antisimetrica</a>
            <a class="item" href="javascript:Solicitud('paginas/Transitiva.php','pagina');">Transitiva</a>
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
            <div class="back-menu"></div>
    </nav>
    
    <div class="muestra" id="pagina">Cargando p&aacute;gina</div>
    
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
