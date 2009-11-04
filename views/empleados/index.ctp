<?php if ($session->check('Empresa.id')) { ?>

<div class="empleados index">
<h2>Empleados</h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('RUT','rut');?></th>
	<th><?php echo $paginator->sort('Apellido', 'apell_paterno');?></th>
	<th><?php echo $paginator->sort('Nombre', 'nombres');?></th>
	<th><?php echo $paginator->sort('Dirección','direccion');?></th>
	<th><?php echo $paginator->sort('ciudad');?></th>
	<th><?php echo $paginator->sort('telefono');?></th>
	<th width="68px" class="actions">Acciones</th>
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
			<?php echo $html->link($empleado['Empleado']['rut'], array('action'=>'view', $empleado['Empleado']['id'])); ?>
		</td>
		<td>
			<?php echo $empleado['Empleado']['apell_paterno']; ?>
		</td>
		<td>
			<?php echo $empleado['Empleado']['nombres']; ?>
		</td>
		<td>
			<?php echo $empleado['Empleado']['direccion']; ?>
		</td>
		<td>
			<?php echo $empleado['Empleado']['ciudad']; ?>
		</td>
		<td>
			<?php echo $empleado['Empleado']['telefono']; ?>
		</td>
		<td class="actions">			
			<?php 
			echo $html->image(
				'b_edit.png', array('title' => 'Modificar', 'url' => array('action'=>'edit', $empleado['Empleado']['id']))
			);			
			echo $html->link(
				$html->image('b_drop.png', array('title' => 'Borrar')), 
				array('action'=>'delete', $empleado['Empleado']['id']), null, 
				sprintf('¿Está seguro que desea borrar al empleado "%s"?', 
					$empleado['Empleado']['nombres'].' '.$empleado['Empleado']['apell_paterno']), false
			); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('anterior', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('siguiente', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Nuevo Empleado', array('action'=>'add')); ?></li>
	</ul>
</div>

<div id="buscar">
<?php 
echo $form->create(array('action' => 'buscar'));
		echo $form->label('rut', 'Búsqueda por RUT:');
		echo $form->text('rut');
		echo $form->end('Buscar');
?>
</div>

<?php } ?>