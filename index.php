<?php
include("panel@saely/conexion/conexion.php");

//ENCUESTA
$rst_encuesta=mysql_query("SELECT * FROM cnsl_encuesta_preguntas", $conexion);
$num_encuesta=mysql_num_rows($rst_encuesta);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confecciones Saely</title>
<base href="<?php echo $web; ?>" />
<link href="css/estilos.css" rel="stylesheet" type="text/css" />

<!-- ENCUESTA -->
<script type="text/javascript" src="js/jquery-1.3.2.js" ></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
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

<!-- SLIDER -->
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="libs/coinslider/coin-slider.min.js"></script>
<link rel="stylesheet" href="libs/coinslider/coin-slider-styles.css" type="text/css" />
<script type="text/javascript">
var jcsl = jQuery.noConflict();
jcsl(document).ready(function() {
	jcsl('#slide_superior').coinslider({
		width: 716, height: 288, spw: 7, sph: 5, delay: 3000, sDelay: 30, opacity: 0.7, 
		titleSpeed: 500, effect: 'random', navigation: false, links : false, hoverPause: true
	});
});
</script>

<!-- FLASH -->
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>

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
          
            	<div id="slide_superior">
                	<a href="imagenes/pruebas/slide1.jpg" target="_blank">
           	  			<img src="imagenes/pruebas/slide1.jpg" alt="Imagen" width="716" height="288" />
                    </a>
                    
                    <a href="imagenes/pruebas/slide2.jpg" target="_blank">
           	  			<img src="imagenes/pruebas/slide2.jpg" alt="Imagen" width="716" height="288" />
                    </a>
                    
                    <a href="imagenes/pruebas/slide3.jpg" target="_blank">
           	  			<img src="imagenes/pruebas/slide3.jpg" alt="Imagen" width="716" height="288" />
                    </a>
                    
                    <a href="imagenes/pruebas/slide4.jpg" target="_blank">
           	  			<img src="imagenes/pruebas/slide4.jpg" alt="Imagen" width="716" height="288" />
                    </a>
                    
                    <a href="imagenes/pruebas/slide5.jpg" target="_blank">
           	  			<img src="imagenes/pruebas/slide5.jpg" alt="Imagen" width="716" height="288" />
                    </a>
                </div><!-- SLIDE SUPERIOR -->
                
            <div id="pder_contenido">
                
       	  	  <div class="pderc_item">
                    	<div class="pderci_imagen"> <a href="producto.php"><img src="imagenes/pruebas/img1.jpg" alt="Imagen" width="218" height="188" /></a></div>
                        <div class="pderci_datos">
                        	<h3 class="texto_t15 texto_centro texto_bold">Marinera</h3>
                        </div>
                    </div><!-- PANEL DERECHA CONTENIDO ITEM -->
                    
              <div class="pderc_item margin_lr15">
                    	<div class="pderci_imagen"> <a href="producto.php"><img src="imagenes/pruebas/img2.jpg" alt="Imagen" width="218" height="188" /></a></div>
                        <div class="pderci_datos">
                        	<h3 class="texto_t15 texto_centro texto_bold">Wamanilla</h3>
                        </div>
                    </div><!-- PANEL DERECHA CONTENIDO ITEM -->
                    
              <div class="pderc_item">
                    	<div class="pderci_imagen"> <a href="producto.php"><img src="imagenes/pruebas/img3.jpg" alt="Imagen" width="218" height="188" /></a></div>
                        <div class="pderci_datos">
                        	<h3 class="texto_t15 texto_centro texto_bold">Champeria</h3>
                        </div>
                    </div><!-- PANEL DERECHA CONTENIDO ITEM -->
                    
              <div class="pderc_item">
                    	<div class="pderci_imagen"> <a href="producto.php"><img src="imagenes/pruebas/img4.jpg" alt="Imagen" width="218" height="188" /></a></div>
                        <div class="pderci_datos">
                        	<h3 class="texto_t15 texto_centro texto_bold">Zapateadores chocan</h3>
                        </div>
                    </div><!-- PANEL DERECHA CONTENIDO ITEM -->
                    
              <div class="pderc_item margin_lr15">
                    	<div class="pderci_imagen"> <a href="producto.php"><img src="imagenes/pruebas/img5.jpg" alt="Imagen" width="218" height="188" /></a></div>
                        <div class="pderci_datos">
                        	<h3 class="texto_t15 texto_centro texto_bold">Pieles Rojas</h3>
                        </div>
                    </div><!-- PANEL DERECHA CONTENIDO ITEM -->
                    
              <div class="pderc_item">
                    	<div class="pderci_imagen"> <a href="producto.php"><img src="imagenes/pruebas/img6.jpg" alt="Imagen" width="218" height="188" /></a></div>
                        <div class="pderci_datos">
                        	<h3 class="texto_t15 texto_centro texto_bold">Vakataki</h3>
                        </div>
                    </div><!-- PANEL DERECHA CONTENIDO ITEM -->
                    
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