function busquedaon(){ 
	document.busquedaon.submit();
}

function tag(id)	{return document.getElementById(id);}
function mostrar(que)	{tag(que).style.visibility = "visible";}
function ocultar(que)	{tag(que).style.visibility = "hidden";}

function link(ciudad){ 
	//alert(ciudad);
	document.getElementById("buscaCiudad").value = ciudad;
	document.formulario1.submit();
} 
