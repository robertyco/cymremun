<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>CyMremun:  [ <?php echo $session->read('Empresa.nombre').' ]'.$title_for_layout?></title>

	<?php
		echo $html->meta('icon');		
		echo $html->css('login');
		echo $scripts_for_layout;
	?>
</head>
<body>

<noscript>
	<META HTTP-EQUIV="refresh" content="0;URL=/cymremun/noscript.php">
</noscript>

<div id="header">
	<div id="title">CyMremun</div>
	<div id="slogan">Sistema de remuneraciones</div>
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