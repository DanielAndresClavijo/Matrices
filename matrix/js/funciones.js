function crearMatriz(cantR1){
    cadena="cantR1=" + cantR1;
    if(cadena=='cantR1=0'){
        alertify.error("Datos incorrectos :(");
    }else{
        $.ajax({
            type:"POST",
            url:"muestra.php",
            data:cadena,
            success:function(r){
                $('#muestra').load('muestra.php');
                $('#muestra2').load('seleccion.html');
                $('#menu').load('menu.html');
                alertify.success("Matriz creada :)");
            }
        });
    }
}

function EditarMatriz(i,j,valor) {
    cadena="i=" + i +
           "&j=" + j +
           "&valor=" + valor;
   $.ajax({
        type:"POST",
        url:"editar2.php",
        data:cadena,
        success:function(r){
            $('#muestra').load('editar.php');
            $('#muestra2').load('muestra.php');
            alertify.success("Campo editado :)");
        }
    });
}
