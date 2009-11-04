<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>CyMremun:  [ <?php echo $session->read('Empresa.nombre').' ]'.$title_for_layout?></title>

	<?php
		echo $html->meta('icon');		
		echo $html->css('contented4');
		echo $scripts_for_layout;
	?>
</head>
<body>
<div id="header">
	<div id="contact"><a href="#">Contacto</a></div>
	<div id="title">CyMremun</div>
	<div id="slogan">Sistema de remuneraciones</div>
</div>

<div id="headinfo">
	<div id="headusuario">
		<?php echo 'Usuario: '.$Auth['User']['username']; ?>
	</div>
	<div id="headempresa">
		<?php echo 'Empresa: '.$session->read('Empresa.nombre'); 
		?>
	</div>
</div>

<div id="sidecontent">

<?php echo $form->create('Fecha', array('action' => 'setFecha'));?>
	<div id="fecha">
	<?php
		echo $form->month('mes', $session->read('mes'));
		echo $form->year('ano', date('Y')-20, date('Y')+10, $session->read('ano'));
	?>
	</div>
<?php echo $form->end('Ir');?>

	<h2>Menú</h2>

	<ul id="nav">
	<li><?php echo $html->link('Inicio', '/'); ?></li>

	<?php if ($Auth['User']['tipo'] != 'consultor') { ?>	
		<li><?php echo $html->link('Empresas', '/empresas'); ?></li>
	<?php } ?>
	
	<?php if ($session->check('Empresa.id')) { ?>
		<li><?php echo $html->link('Empleados', '/empleados'); ?></li>
	<?php } ?>
<!--	<li><?php echo $html->link('Haberes y descuentos', '/haberes_descuentos'); ?></li> -->
	
	<?php if ($Auth['User']['tipo'] == 'administrador') { ?>
		<li><?php echo $html->link('Usuarios', '/users'); ?></li>
	<?php } ?>
	
	<li><?php echo $html->link('Salir', array('controller' => 'users', 'action' => 'logout')); ?></li>
	</ul>
	
	<h2>Mantención</h2>

	<ul>
	<li><?php echo $html->link('AFP', '/afps'); ?></li>
	<li><?php echo $html->link('Isapre', '/isapres'); ?></li>
	<li><?php echo $html->link('Asignación familiar', '/asignacion_familiars'); ?></li>
	<li><?php echo $html->link('Impuesto unico', '/impuesto_unicos'); ?></li>
	</ul>
</div>

<div id="maincontent">
	<?php
		if ($session->check('Message.flash')):
				$session->flash();
		endif;
	?>
	<?php echo $content_for_layout?>
</div>

<div id="footer">
Eduardo Daniel Collado Cortés <br />
Arlegui 440 - Oficina 215 - Viña del Mar | Fono - Fax: 688042
</div>

<?php echo $cakeDebug?>
</body>
</html>