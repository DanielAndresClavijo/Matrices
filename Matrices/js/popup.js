//popup Crear
var btnAbrirCrear = document.getElementById('btn-abrir-crear'),
	crear = document.getElementById('crear'),
	popup1 = document.getElementById('popup1'),
	btnCerrarCrear = document.getElementById('btn-cerrar-crear'),
        muestra = document.getElementById('muestra'),
        btnActualizar = document.getElementById('btn-actualizar');

btnAbrirCrear.addEventListener('click', function(){
        muestra.style.display = 'none';
        crear.style.display = 'block';        
	crear.classList.add('active');
	popup1.classList.add('active');
});

btnCerrarCrear.addEventListener('click', function(e){
	e.preventDefault();
        crear.style.display = 'none';
        muestra.style.display = 'block';
	crear.classList.remove('active');
	popup1.classList.remove('active');
});

