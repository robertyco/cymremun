<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>CyMremun:  [ <?php echo $session->read('Empresa.nombre').' ]'.$title_for_layout?></title>

	<?php
		echo $html->meta('icon');		
		echo $html->css('contented4');
		//echo $html->css('cake.generic');
		echo $scripts_for_layout;
	?>
</head>
<body>
<div id="header">
	<div id="contact"><a href="#">Contacto</a></div>
	<div id="title">CyMremun</div>
	<div id="slogan">Sistema de remuneraciones</div>
</div>

<div id="sidecontent">
	<h2>Menú</h2>

	<ul id="nav">
	<li><?php echo $html->link('Inicio', '/'); ?></li>
	<li><?php echo $html->link('Empresas', '/empresas'); ?></li>
	<li><?php echo $html->link('Empleados', '/empleados'); ?></li>
	<li><?php echo $html->link('Haberes y descuentos', '/haberes_descuentos'); ?></li>
	</ul>	

	<h2>Mantención</h2>

	<ul>
	<li><?php echo $html->link('AFP', '/afps'); ?></li>
	<li><?php echo $html->link('Isapre', '/isapres'); ?></li>
	</ul>
</div>

<div id="maincontent">
	<?php
		if ($session->check('Message.flash')):
				$session->flash();
		endif;
	?>
	<?php echo $content_for_layout?>

	<!--
	<div id="path">
		<a href="#">Home</a>
		&nbsp;>&nbsp;
		<a href="#">Section Title</a>
		&nbsp;>&nbsp;
		<a href="#">Subsection Title</a>
		&nbsp;>&nbsp;
		<a href="#">Page Title</a>
	</div> -->
</div>

<div id="footer">
Eduardo Daniel Collado Cortés <br />
Arlegui 440 - Oficina 215 - Viña del Mar | Fono - Fax: 688042
<!--
<div id="copyright">
Copyright &copy; 2008 CyM Solutions |
Design by <a href="http://ContentedDesigns.com">Contented Designs</a>
</div>

<div id="footercontact">
<a href="#">Contact</a>
</div>
-->
</div>

<?php echo $cakeDebug?>
</body>
</html>