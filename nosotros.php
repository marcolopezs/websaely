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
<title>Nosotros | Confecciones Saely</title>
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
                    	<h2 class="texto_t25 texto_8C272D texto_bold">Nosotros</h2>
                    </div><!-- NOTICIA WEB TITULO -->
                    <div id="notweb_descripcion">
                    	<p>Nuestra filosofía administrativa, esencia de la cultura corporativa, ha servido para establecer el plan estratégico y será guía permanente en cada una de las acciones. Esta filosofía administrativa se fundamenta en sólidos valores y se expresa en los siguientes términos: asistimos a los clientes en satisfacción de sus necesidades, les brindamos aquellos servicios que pudieran requerir completamente empleando nuestras potencialidades y fortalezas en negocios donde tenemos ventajas competitivas.
                    	  Somos una organización creativa e imaginativa, con innovación permanente de procesos aspirando a ser una empresa de clase mundial.		 	
                   	  </p>
                   	  <p>&nbsp;</p>
                    	<p>Empleamos la excelencia en cada disciplina y actuamos con justicia y seriedad bajo las normas  de las más alta ética; responsabilidad y compromiso con nuestros clientes. Finalmente los trabajadores compartimos plenamente la misión y visión para proveer servicios de calidad hoy mañana, preocupados por la mejora continua como una filosofía de productividad con calidad.
                   	  </p>
                   	  <p>&nbsp;</p>
                    	<p><img class="float_left padding_r10" src="imagenes/logo.png" width="304" height="131" alt="Logo" />"Satisfacer la necesidad de hacer ropa con más calidad a bajo costo, para clientes de ingresos medios y bajos, con prendas pequeñas y medianas; diseñadas con la tecnología más eficiente de la mejor calidad de tela.
                    	  Somos una organización con personal idóneo que ha aceptado el reto de ser líder en la venta de ropa veraniega, lencería, ropa sport, ternos, que satisfagan las necesidades del cliente ofreciendo ropa que con jueguen en forma optima, innovación, calidad servicio y condiciones de venta”. "Nosotros tenemos proyectado para el 2011 ser líderes en el mercado de prendas de vestir tanto a nivel nacional como a nivel internacional, gracias a maquinarias renovadoras y personal técnico altamente capacitado para llegar al objetivo trazado y así satisfacer a los clientes en mayoría y ser símbolo de la calidad total."
                  	  </p>
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