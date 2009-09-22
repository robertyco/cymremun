<div class="empresas index">
<h2><?php __('Empresas');?></h2>

<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('RUT', 'rut');?></th>
	<th><?php echo $paginator->sort('nombre');?></th>
	<th><?php echo $paginator->sort('actividad');?></th>
	<th><?php echo $paginator->sort('Dirección','direccion');?></th>
	<th><?php echo $paginator->sort('ciudad');?></th>
	<th><?php echo $paginator->sort('Teléfono','telefono');?></th>
	<th><?php echo $paginator->sort('Rep. Legal', 'rep_legal_nombre');?></th>
	<th class="actions"><?php __('Acciones');?></th>
</tr>
<?php
$i = 0;
foreach ($empresas as $empresa):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $empresa['Empresa']['rut']; ?>
		</td>
		<td>
			<?php echo $empresa['Empresa']['nombre']; ?>
		</td>
		<td>
			<?php echo $empresa['Empresa']['actividad']; ?>
		</td>
		<td>
			<?php echo $empresa['Empresa']['direccion']; ?>
		</td>
		<td>
			<?php echo $empresa['Empresa']['ciudad']; ?>
		</td>
		<td>
			<?php echo $empresa['Empresa']['telefono']; ?>
		</td>
		<td>
			<?php echo $empresa['Empresa']['rep_legal_nombre']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link('A', array('action'=>'activar', $empresa['Empresa']['id'], $empresa['Empresa']['nombre'])); ?>
			<?php echo $html->link('V', array('action'=>'view', $empresa['Empresa']['id'])); ?>
			<?php echo $html->link('E', array('action'=>'edit', $empresa['Empresa']['id'])); ?>
			<?php echo $html->link('B', array('action'=>'delete', $empresa['Empresa']['id']), null, sprintf(__('¿Está seguro que quiere borrar la empresa "%s"?', true), $empresa['Empresa']['nombre'])); ?>
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
		<li><?php echo $html->link('Nueva Empresa', array('action'=>'add')); ?></li>
	</ul>
</div>
