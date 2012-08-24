<?php
include("panel@saely/conexion/conexion.php");

//ENCUESTA
$rst_encuesta=mysql_query("SELECT * FROM cnsl_encuesta_preguntas", $conexion);
$num_encuesta=mysql_num_rows($rst_encuesta);

//PRODUCTO
$rst_noticia=mysql_query("SELECT * FROM cnsl_noticia WHERE id=1;", $conexion);
$fila_noticia=mysql_fetch_array($rst_noticia);
$idnoticia=$fila_noticia["id"];

//FOTOS PRODUCTOS
$rst_noticia_galeria=mysql_query("SELECT * FROM cnsl_noticia_slide WHERE noticia=$idnoticia", $conexion);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $fila_noticia["titulo"]; ?> | Confecciones Saely</title>
<base href="<?php echo $web; ?>" />
<link href="css/estilos.css" rel="stylesheet" type="text/css" />

<!-- FLASH -->
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>

<!-- ENCUESTA -->
<script type="text/javascript" src="js/jquery-1.3.2.js" ></script>
<script type="text/javascript">
var jenc = jQuery.noConflict();
jenc(function(){
	var pollcontainer=jenc('#penc_resultado');
	jenc.get('libs/encuesta/encuesta_principal/poll.php', '', function(data, status){
		pollcontainer.html(data);
		animateResults(pollcontainer);
		pollcontainer.find('#pollform').submit(function(){
			var selected_val=jenc(this).find('input[name=poll]:checked').val();
			if(selected_val!=''){
				jenc.post('libs/encuesta/encuesta_principal/poll.php', jenc(this).serialize(), function(data, status){
					jenc('#pe_opciones').fadeOut(100, function(){
						jenc(this).html(data);
						animateResults(this);
					});
				});
			}
			return false;
		});
	});
	
	function animateResults(data){
		jenc(data).find('.bar').hide().end().fadeIn('slow', function(){
			jenc(this).find('.bar').each(function(){
				var bar_width=jenc(this).css('width');
				jenc(this).css('width', '0').animate({ width: bar_width }, 1000);
			});
		});
	}
	
});
</script>

<!-- GALERIA DE FOTOS -->
<link rel="stylesheet" type="text/css" href="libs/adgallery/jquery.ad-gallery.css">
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="libs/adgallery/jquery.ad-gallery.js"></script>
<script type="text/javascript">
var jntgal = jQuery.noConflict();
jntgal(function() {
var galleries = jntgal('.ad-gallery').adGallery();
	jntgal('#switch-effect').change(
		function(){
			galleries[0].settings.effect = jntgal(this).val();
			return false;
});});
</script>

</head>

<body>

<?php include("cabecera.php"); ?>

<div id="contenido" class="limpiar">

	<div class="interior">
    	
        <div id="cuerpo">
        
    		<div id="panel_izq">
        
        		<div class="item_pizq">
            	
                <div id="categoria_cabecera"><h3>Categorias</h3></div>
                
                <div id="categoria_contenido">
                	<ul>
                    	<li><a href="categoria">Danzas de la Costa</a></li>
                        <li><a href="categoria">Danzas de la Sierra</a></li>
                        <li><a href="categoria">Danzas de la Selva</a></li>
                        <li><a href="categoria">Marinera</a></li>
                        <li><a href="categoria">Tondero</a></li>
                        <li><a href="categoria">Saya</a></li>
                    </ul>
                </div>
                
            </div><!-- ITEM PANEL IZQUIERDA -->
            
            	<div class="item_pizq">
                	<div id="panel_encuesta">
                        <div id="penc_cabecera"><h3>Encuesta</h3></div>
                        <div id="penc_resultado"></div>
                    </div><!-- FIN ENCUESTA -->
                </div>
            
        	</div><!-- PANEL IZQUIERDA -->
        	
          	<div id="panel_der">
            
            	<div id="notweb">
                	<div id="notweb_titulo">
                    	<h2 class="texto_t25 texto_8C272D"><?php echo $fila_noticia["titulo"]; ?></h2>
                    </div><!-- NOTICIA WEB TITULO -->
                    <div id="notweb_imagen">
                        <div id="gallery" class="ad-gallery">
                          <div class="ad-image-wrapper"></div>
                          <div class="ad-controls"></div>
                          <div class="ad-nav">
                            <div class="ad-thumbs">
                              <ul class="ad-thumb-list">
                                <?php while($fila_noticia_galeria=mysql_fetch_array($rst_noticia_galeria)){ ?>
                                <li>
                              <a href="imagenes/upload/<?php echo $fila_noticia_galeria["carpeta"]."".$fila_noticia_galeria["imagen"] ?>">
                                <img src="imagenes/upload/<?php echo $fila_noticia_galeria["carpeta"]."thumb/".$fila_noticia_galeria["imagen"] ?>" width="90" height="60" class="image<?php echo $fila_noticia_galeria["id"] ?>" title="<?php echo $fila_noticia_galeria["titulo"] ?>">
                              </a>
                            </li>
                            <?php } ?>
                              </ul>
                            </div>
                          </div>
                        </div>
                    </div><!-- NOTICIA WEB IMAGEN -->
                    <div id="notweb_descripcion">
                    	<p>Dignissim porta magna ultricies montes? Cum integer mus aliquam lundium in diam lorem non urna, augue vel magnis dapibus urna magna purus platea purus, natoque a dictumst non porta ac, ultricies aliquam dis porta, est, porta purus odio cursus, elementum adipiscing lundium scelerisque turpis pulvinar scelerisque scelerisque egestas. Ac elementum nascetur proin etiam pulvinar sed, nec, in? Pulvinar tempor sociis. Penatibus vut scelerisque etiam sociis, mus, nisi sit auctor ac dolor est? Non et porta augue pid nec? Odio vut, tempor dolor in placerat scelerisque in! Nisi parturient platea. Amet, sit? Etiam tempor sagittis sociis sit magna mattis lundium etiam.</p>
                    </div><!-- NOTICIA WEB DESCRIPCION -->
                </div>
            
            <div id="pder_contenido">
                                    
            </div><!-- PANEL DERECHA CONTENIDO -->
                
          </div><!-- PANEL DERECHA -->
        
    	</div>
    	
	</div><!-- INTERIOR -->
    
</div><!-- CONTENIDO -->

<div id="footer" class="limpiar">
	
    <div class="interior">
    
    	<p class="padding_t20 texto_blanco texto_centro"><a href="#" title="Inicio">Inicio</a> | <a href="#" title="Nosotros">Nosotros</a> | <a href="#" title="Productos">Productos</a> | <a href="#" title="Contactenos">Contactenos</a></p>
        <p class="padding_t10 texto_blanco texto_centro">Av. Aviacion 170 La Victoria - Lima Perú / Telf: 01-352-6707</p>
        <p class="padding_t10 texto_blanco texto_centro">© Copyright Confecciones SAELY, todos los derechos reservados, prohibida la reproduccion parcial o total de esta página</p>
        
    </div><!-- INTERIOR -->

</div><!-- FOOTER -->

<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
</html>