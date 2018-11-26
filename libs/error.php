<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans" rel="stylesheet">

<?php 
include_once '../clases/Sesion.php';
$ss = Sesion::iniciarSesion() ;

if ($ss->checkActiveSession()) {
	include 'header.php'; 
} else {
	include 'headerno.php'; 
}
 ?>

<body>
	 <p class="codigoError">Ha habido un error inesperado</p> 
	 <img class="img_error" src="http://localhost:90/miproyecto/img/error.png" height="180px">
</body>
<?php 
 include 'footer.php'; 
 ?>

