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
<title>Contactenos | Confecciones Saely</title>
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
                    	<h2 class="texto_t25 texto_8C272D texto_bold">Contactenos</h2>
                    </div><!-- NOTICIA WEB TITULO -->
                    <div id="notweb_descripcion">
                    	
                    	<form method="post" id="formcontacto">
                        	<fieldset class="sin_borde">
                            	<label>Nombre completo:</label>
                                <input name="nombre_completo" type="text" id="nombre_completo" size="40"  />
                            </fieldset>
                          <fieldset class="sin_borde">
                                <label>Teléfono:</label>
                                <input name="telefono" type="text" id="telefono" size="40"  />
                            </fieldset>
                          <fieldset class="sin_borde">
                            	<label>Email:</label>
                                <input name="email" type="text" id="email" size="40"  />
                            </fieldset>
                          <fieldset class="sin_borde">
                            	<label>Dirección:</label>
                                <input name="direccion" type="text" id="direccion" size="40"  />
                            </fieldset>
                          <fieldset class="sin_borde">
                            	<label>Mensaje:</label>
                            	<textarea name="mensaje" id="mensaje" cols="50" rows="5"></textarea>
                          </fieldset>
                          <fieldset class="margin_l170 padding_10 ancho_330">
                          		<legend>Código de Seguridad</legend>
                                <img src="captcha/captcha.php" id="captcha" />
<a href="javascript:;" onclick="document.getElementById('captcha').src='captcha/captcha.php?'+Math.random();" id="change-image">
Recargar Código</a><br/><br/>
<input type="text" name="captcha" id="captcha-form" />
                          </fieldset>
                          <fieldset class="sin_borde texto_centro padding_t20">
                          		<input name="btnenviar" type="submit" id="btnenviar" value="Enviar" />                          
                          </fieldset>
                        </form>
                    	
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