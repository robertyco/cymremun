<div class="users index">
<h2>Usuarios</h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('username');?></th>
	<th><?php echo $paginator->sort('email');?></th>
	<th><?php echo $paginator->sort('tipo');?></th>
	<th><?php echo $paginator->sort('Empresa', 'empresa_id');?></th>
	<th class="actions">Acciones</th>
</tr>
<?php
$i = 0;
foreach ($users as $user):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $user['User']['username']; ?>
		</td>
		<td>
			<?php echo $user['User']['email']; ?>
		</td>
		<td>
			<?php echo $user['User']['tipo']; ?>
		</td>
		<td>
			<?php echo $user['Empresa']['nombre']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link('E', array('action'=>'edit', $user['User']['id'])); ?>
			<?php echo $html->link('B', array('action'=>'delete', $user['User']['id']), null, sprintf(__('Está seguro que desea borrar el usuario "%s"?', true), $user['User']['username'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< anterior', array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next('siguiente >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Crear usuario', array('action'=>'add')); ?></li>
	</ul>
</div>
