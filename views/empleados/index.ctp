<?php if ($session->check('Empresa.id')) { ?>

<div class="empleados index">
<h2><?php __('Empleados');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('RUT','rut');?></th>
	<th><?php echo $paginator->sort('apell_paterno');?></th>
	<th><?php echo $paginator->sort('apell_materno');?></th>
	<th><?php echo $paginator->sort('nombres');?></th>
	<th><?php echo $paginator->sort('Dirección','direccion');?></th>
	<th><?php echo $paginator->sort('comuna');?></th>
	<th><?php echo $paginator->sort('ciudad');?></th>
	<th><?php echo $paginator->sort('telefono');?></th>
	<th><?php echo $paginator->sort('celular');?></th>
	<th class="actions"><?php __('Actions');?></th>
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
			<?php echo $empleado['Empleado']['rut']; ?>
		</td>
		<td>
			<?php echo $empleado['Empleado']['apell_paterno']; ?>
		</td>
		<td>
			<?php echo $empleado['Empleado']['apell_materno']; ?>
		</td>
		<td>
			<?php echo $empleado['Empleado']['nombres']; ?>
		</td>
		<td>
			<?php echo $empleado['Empleado']['direccion']; ?>
		</td>
		<td>
			<?php echo $empleado['Empleado']['comuna']; ?>
		</td>
		<td>
			<?php echo $empleado['Empleado']['ciudad']; ?>
		</td>
		<td>
			<?php echo $empleado['Empleado']['telefono']; ?>
		</td>
		<td>
			<?php echo $empleado['Empleado']['celular']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link('Ver', array('action'=>'view', $empleado['Empleado']['id'])); ?>
			<?php echo $html->link('Editar', array('action'=>'edit', $empleado['Empleado']['id'])); ?>
			<?php echo $html->link('Borrar', array('action'=>'delete', $empleado['Empleado']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $empleado['Empleado']['id'])); ?>
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

<?php } ?>