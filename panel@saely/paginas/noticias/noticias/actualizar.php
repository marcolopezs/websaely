<?php
session_start();
include("../../../conexion/conexion.php");
include("../../../conexion/funciones.php");
require_once('../../../../libs/thumbs/ThumbLib.inc.php');

//DECLARACION DE VARIABLES
$idnoticia=$_REQUEST["id"];
$titulo=$_POST["titulo"];
$contenido=$_POST["contenido"];
$categoria=$_POST["categoria"];
$comentarios=$_POST["comentarios"];;
$fecha=fechaLarga();
$hora=date("H:i");

//FECHA PUBLICACION
$fecha_publicacion=$_POST["fecha"];
$hora_publicacion=$_POST["hora"];
$fecha_pub=$fecha_publicacion." ".$hora_publicacion.":00";

//SELECCIONAR REGISTRO PARA VERIFICAR IMAGEN
$rst_query=mysql_query("SELECT * FROM ".$tabla_suf."_noticia WHERE id=$idnoticia LIMIT 1;", $conexion);
$fila_query=mysql_fetch_array($rst_query);

//IMAGEN
if($tipo_multimedia=="imagen"){
	if($_POST['flash_uploader_0_tmpname']==""){
		$imagen=$_POST["imagen_actual"];
		$carpeta_imagen=$_POST["carpeta_imagen"];
	}elseif($_POST['flash_uploader_0_tmpname']<>""){
		$imagen=$_POST['flash_uploader_0_tmpname'];
		$carpeta_imagen=fechaCarpeta()."/";
		$thumb=PhpThumbFactory::create("../../../../imagenes/upload/".$carpeta_imagen."".$imagen."");
		$thumb->adaptiveResize(218,188);
		$thumb->save("../../../../imagenes/upload/".$carpeta_imagen."thumb/".$imagen."", "jpg");
	}
}

//GUARDAR DATOS
mysql_query("UPDATE ".$tabla_suf."_noticia SET titulo='".addslashes($titulo)."', 
contenido='$contenido', 
imagen='$imagen', 
dato_fecha='$fecha', 
dato_hora='$hora', 
dato_usuario='$usuario_user', 
categoria=$categoria,
carpeta_imagen='$carpeta_imagen',
fecha_publicacion='$fecha_pub' WHERE id=$idnoticia;", $conexion);
	
if (mysql_errno()!=0)
{
	echo "error al insertar los datos ". mysql_errno() . " - ". mysql_error();
	mysql_close($conexion);
	//header("Location:listar.php?mensaje=5");
} else {
	//echo "si subio";
	//echo "error al insertar los datos ". mysql_errno() . " - ". mysql_error();
	mysql_close($conexion);
	header("Location:listar.php?mensaje=2");
}

?>