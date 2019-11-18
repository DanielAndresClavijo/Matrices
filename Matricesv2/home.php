<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Parallax Scrolling With Javascript</title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link rel="stylesheet" href="css/popup.css">
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<section class="zoom">
		<img src="img/left.png" id="layer1" >
		<img src="img/right.png" id="layer2" >
		<div id="text" >
			<div class="contentenedor">
				<h1>
					<span>M</span>
					<span>a</span>
					<span>t</span>
					<span>r</span>
					<span>i</span>
					<span>c</span>
					<span>e</span>
					<span>s</span>
				</h1>
			</div>
		</div>
	</section>
	<!-- <canvas id="my-canvas" width="1500" height="950" style="position: absolute; display: inherit; z-index: -100;"></canvas> -->
	<section class="content">
		<div class="ContTitulo">
			<h1>
				<span>F</span>
				<span>u</span>
				<span>n</span>
				<span>c</span>
				<span>i</span>
				<span>o</span>
				<span>n</span>
				<span>e</span>
				<span>s</span>			
			</h1>
			<h1>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span>y</span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</h1>
			<h1>
				<span>R</span>
				<span>e</span>
				<span>l</span>
				<span>a</span>
				<span>c</span>
				<span>i</span>
				<span>o</span>
				<span>n</span>
				<span>e</span>
				<span>s</span>
			</h1>
		</div>

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
            $html = '<div class="limiter">';
			$html .= '<div class="container-table100">';
			$html .= '<div class="wrap-table100">';
			$html .= '<div class="table100 ver1">';
			$html .= '<div class="table100-firstcol">';
            $html .= '<table>';
            $html .= '<thead>';
			$html .= '<tr class="row100 head">';
			$html .= '<th class="cell100 column1">Posiciones</th>';
			$html .= '</tr>';
			$html .= '</thead>';
			$html .= '<tbody>';
            // Para crear las columnas X ( $ejeX = 1 a 10 )
            for($b = 1; $b <= $cantR1;$b++) {
              $html .= '<tr class="row100 body"><td class="cell100 column1">'.$b.'</td></tr>';
            }
            $html .= '</tbody>';
            $html .= '</table>';
            $html .= '</div>';
        	$html .= '<div class="wrap-table100-nextcols js-pscroll">';
			$html .= '<div class="table100-nextcols">';
			$html .= '<table>';
			$html .= '<thead>';
			$html .= '<tr class="row100 head">';
			for($a = 1; $a <= $cantR1;$a++) {
              $html .= '<th class="cell100 column2">'.$a.'</th>';
            }
            $html .= '</tr>';
            $html .= '</thead>';
            $html .= '<tbody>';
            $i=1;
            $j=1;
            foreach ( $ejesYX as $col_Y => $valores ) {

              $html .= '<tr class="row100 body">';

              foreach ( $valores as $val ) {
                // Creamos los campos de los valores
                  if($i == $j){
                      $html .= '<td class="cell100 column2">'.$val.'</td>';
                      $j++;
                  }else{
                      $html .= '<td class="cell100 column2">'.$val.'</td>';
                      $j++;
                  }

              }
              $i++;
              $j=1;
              $html .= '</tr>';
            }

            $html .= '</tbody>';
			$html .= '</table>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';

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
	</section>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popup.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="js/main.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})

			$(this).on('ps-x-reach-start', function(){
				$(this).parent().find('.table100-firstcol').removeClass('shadow-table100-firstcol');
			});

			$(this).on('ps-scroll-x', function(){
				$(this).parent().find('.table100-firstcol').addClass('shadow-table100-firstcol');
			});

		});

		
		
		
	</script>
	<script type="text/Javascript">
		var layer1 = document.getElementById('layer1');
		scroll = window.pageYOffset;
		document.addEventListener('scroll', function (e) {
			var offset = window.pageYOffset;
			scroll = offset;
			layer1.style.width = (100 + scroll/5) + '%';
		});

		var layer2 = document.getElementById('layer2');
		scrol2 = window.pageYOffset;
		document.addEventListener('scroll', function (e) {
			var offset = window.pageYOffset;
			scroll = offset;
			layer2.style.width = (100 + scrol2/5) + '%';
			layer2.style.left = scroll/50 + '%';
		});

		var text = document.getElementById('text');
		scroll = window.pageYOffset;
		document.addEventListener('scroll', function (e) {
			var offset = window.pageYOffset;
			scroll = offset;
			layer2.style.width = (100 + scroll/5) + '%';
			text.style.top = - scroll/20 + '%';
		});
	</script>
</body>
</html>