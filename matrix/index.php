<?php
        session_start();
        ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Matrices</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="alertifyjs/css/alertify.css">
        <link rel="stylesheet" type="text/css" href="alertifyjs/css/themes/default.css">
        <link rel="stylesheet" type="text/css" href="select2/css/select2.css">
        <link rel="stylesheet" type="text/css"  href="css/style.css">
        
        <!-- Archivos js -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/funciones.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="alertifyjs/alertify.js"></script>
        <script src="select2/js/select2.js"></script>
        
    </head>
    <body>
        <ul class="menu" id="menu">
        </ul>
        <ul class="menu" id="menu2" style="display: none;"></ul>
    <!-- -->  
    <div class="overlay" id="crear" style="background: black;">
        <div class="popup" id="popup1">
            <a href="#" id="btn-cerrar-crear" class="btn-cerrar-popup">cerrar</a>
            <h3>Creacion De Nueva Matriz</h3>
            <p>Ingrese la dimension de la Matriz, recuerde que
                solo se permiten valores de 2 hasta 50.<br>
            <br>Ejemplo: Si ingresa 2, la dimension de la matriz sera de 2x2</p>
            <div id="form" role="document">
                <div class="contenedor-inputs">
                    <input type="number" min="2" max="50" name="cantR1" id="cantR1" value="0" placeholder="Ingrese la dimension de la matriz" required >
                </div>
                <button type="button" class="btn-submit" id="crearNuevo">Crear</button>
            </div>
        </div>
    </div>
    
    <div id="muestra" class="muestra">
    </div>
    <div id="muestra2" class="muestra">Selecciones una opcion para mostrar algun resultado aqui</div>
        <?php
        if(!isset($_SESSION["cantR1"])){
            echo "  <script type='text/javascript'>
                        $('#menu').load('menu.html');
                        $('#muestra').load('muestra.php');
                    </script>";
        }else{
            echo "  <script type='text/javascript'>
                        $('#muestra').load('muestra2.html');
                    </script>";
        }
        ?> 
    
    <script>
        $('#crearNuevo').click(function(){
            document.getElementById('crear').style.display = 'none';
            document.getElementById('muestra').style.display = 'block';
            document.getElementById('crear').classList.remove('active');
            document.getElementById('popup1').classList.remove('active');
            if ($('#cantR1').val() >= 2 && $('#cantR1').val() <= 50) {
                cantR1=$('#cantR1').val();
                crearMatriz(cantR1);
            }else{
                cantR1=0;
                crearMatriz(cantR1);
            }
            
        });
        
         
    </script>
        
    </body>
</html>
