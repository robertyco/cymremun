<div class="empleadosHaberesDescuentos index">
<h2>Haberes y Descuentos</h2>
<h3><?php echo $empleadoNombre['Empleado']['nombres'].' '.
			$empleadoNombre['Empleado']['apell_paterno'].' '.
			$empleadoNombre['Empleado']['apell_materno']?></h3>
&nbsp;
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('fecha');?></th>
	<th><?php echo $paginator->sort('Ítem', 'haberes_descuento_id');?></th>
	<th><?php echo $paginator->sort('tipo', 'HaberesDescuento.tipo');?></th>
	<th><?php echo $paginator->sort('valor');?></th>
	<th class="actions"><?php __('Actions');?></th>
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
			<?php echo $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['id']; ?>
		</td>
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
			<?php echo $html->link(__('View', true), array('action'=>'view', $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['id'])); ?>
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
		echo $form->input('fecha', array('dateFormat' => 'DMY'));
		echo $form->input('valor');
		echo $form->input('haberes_descuento_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List EmpleadosHaberesDescuentos', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Empleados', true), array('controller'=> 'empleados', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Empleado', true), array('controller'=> 'empleados', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Haberes Descuentos', true), array('controller'=> 'haberes_descuentos', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Haberes Descuento', true), array('controller'=> 'haberes_descuentos', 'action'=>'add')); ?> </li>
	</ul>
</div>
