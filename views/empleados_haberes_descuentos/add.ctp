<div class="empleadosHaberesDescuentos index">
<h2>Asignar haberes y descuentos</h2>
<h3><?php echo $empleadoNombre['Empleado']['nombres'].' '.
			$empleadoNombre['Empleado']['apell_paterno'].' '.
			$empleadoNombre['Empleado']['apell_materno']?></h3>
&nbsp;
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('fecha');?></th>
	<th><?php echo $paginator->sort('Ítem', 'haberes_descuento_id');?></th>
	<th><?php echo $paginator->sort('tipo', 'HaberesDescuento.tipo');?></th>
	<th><?php echo $paginator->sort('valor');?></th>
	<th class="actions">Acciones</th>
</tr>
<?php
$i = 0;
foreach ($empleadosHaberesDescuentos as $empleadosHaberesDescuento):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['fecha']; ?>
		</td>
		<td>
			<?php echo $html->link($empleadosHaberesDescuento['HaberesDescuento']['nombre'], array('controller'=> 'haberes_descuentos', 'action'=>'view', $empleadosHaberesDescuento['HaberesDescuento']['id'])); ?>
		</td>
		<td>
			<?php echo $empleadosHaberesDescuento['HaberesDescuento']['tipo']; ?>
		</td>
		<td>
			<?php echo $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['valor']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link('E', array('action'=>'edit', $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['id'])); ?>
			<?php echo $html->link('B', array('action'=>'delete', $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['id']), null, sprintf(__('¿Está seguro que desea borrar el ítem # %s?', true), $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>

<div class="empleadosHaberesDescuentos form">
<?php echo $form->create('EmpleadosHaberesDescuento');?>
	<fieldset>
 		<legend></legend>
	<?php
		echo $form->input('haberes_descuento_id', array('label' => 'Ítem', 'div' => 'w25'));
		echo $form->input('valor', array('div' => 'w25'));
		echo '<br />';
		echo $form->input('fecha', array('dateFormat' => 'DMY', 'div' => 'w50'));
	?>
	</fieldset>
<?php echo $form->end('Asignar');?>
</div>
