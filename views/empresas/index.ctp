<div class="empresas index">
<h2><?php __('Empresas');?></h2>

<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('ID','id');?></th>
	<th><?php echo $paginator->sort('rut');?></th>
	<th><?php echo $paginator->sort('nombre');?></th>
	<th><?php echo $paginator->sort('actividad');?></th>
	<th><?php echo $paginator->sort('Dirección','direccion');?></th>
	<th><?php echo $paginator->sort('comuna');?></th>
	<th><?php echo $paginator->sort('ciudad');?></th>
	<th><?php echo $paginator->sort('Región','region');?></th>
	<th><?php echo $paginator->sort('Teléfono','telefono');?></th>
	<th><?php echo $paginator->sort('fax');?></th>
	<th><?php echo $paginator->sort('email');?></th>
	<th><?php echo $paginator->sort('rep_legal_rut');?></th>
	<th><?php echo $paginator->sort('rep_legal_nombre');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
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
			<?php echo $empresa['Empresa']['id']; ?>
		</td>
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
			<?php echo $empresa['Empresa']['comuna']; ?>
		</td>
		<td>
			<?php echo $empresa['Empresa']['ciudad']; ?>
		</td>
		<td>
			<?php echo $empresa['Empresa']['region']; ?>
		</td>
		<td>
			<?php echo $empresa['Empresa']['telefono']; ?>
		</td>
		<td>
			<?php echo $empresa['Empresa']['fax']; ?>
		</td>
		<td>
			<?php echo $empresa['Empresa']['email']; ?>
		</td>
		<td>
			<?php echo $empresa['Empresa']['rep_legal_rut']; ?>
		</td>
		<td>
			<?php echo $empresa['Empresa']['rep_legal_nombre']; ?>
		</td>
		<td>
			<?php echo $empresa['Empresa']['created']; ?>
		</td>
		<td>
			<?php echo $empresa['Empresa']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link('Act', array('action'=>'activar', $empresa['Empresa']['id'], $empresa['Empresa']['nombre'])); ?>
			<?php echo $html->link('Ver', array('action'=>'view', $empresa['Empresa']['id'])); ?>
			<?php echo $html->link('Editar', array('action'=>'edit', $empresa['Empresa']['id'])); ?>
			<?php echo $html->link('Borrar', array('action'=>'delete', $empresa['Empresa']['id']), null, sprintf(__('¿Está seguro que quiere borrar la empresa %s?', true), $empresa['Empresa']['nombre'])); ?>
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
