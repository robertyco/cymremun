<?php if ($session->check('Empresa.id')) { ?>

<div class="empleados index">
<h2><?php echo $haberesDescuento['HaberesDescuento']['nombre']; ?></h2>
<?php echo $form->create(null, array('url' => '/haberes_descuentos/add_asignar_hd/'.$haberesDescuento['HaberesDescuento']['id']));?>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('Nombre', 'apell_paterno');?></th>
	<th width="25%">Valor</th>
</tr>
<?php
$i = 0;
foreach ($empleados as $empleado):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $empleado['Empleado']['apell_paterno'].' '.$empleado['Empleado']['apell_materno'].' '.$empleado['Empleado']['nombres']; ?>
		</td>
		<td>
		<?php
		$valor = null;
		foreach ($haberesDescuento['EmpleadosHaberesDescuento'] as $haberDescuento):
			if (($haberDescuento['empleado_id'] == $empleado['Empleado']['id']) && ($haberDescuento['fecha'] == $session->read('fecha'))) {
				$valor = $haberDescuento['valor'];				
			}
		endforeach;
		echo $form->input('valor'.$i, array( 'label' => false , 'div' => 'w25', 'default' => $valor));
		?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $form->end('Asignar');?>
</div>
<?php } ?>