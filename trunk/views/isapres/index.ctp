<div class="isapres index">
<h2><?php __('Isapres');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('nombre');?></th>
	<th width="68px" class="actions">Acciones</th>
</tr>
<?php
$i = 0;
foreach ($isapres as $isapre):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $isapre['Isapre']['nombre']; ?>
		</td>
		<td class="actions">			
			<?php echo $html->link(
				$html->image('b_edit.png', array('title' => 'Editar')), 
				array('action'=>'edit', $isapre['Isapre']['id']), null, null, false
			); ?>
			<?php echo $html->link(
				$html->image('b_drop.png', array('title' => 'Borrar')), 
				array('action'=>'delete', $isapre['Isapre']['id']), null, 
				sprintf(__('¿Está seguro que desea borrar "%s"?', true), $isapre['Isapre']['nombre']), false
			); ?>
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
		<li><?php echo $html->link('Nueva Isapre', array('action'=>'add')); ?></li>
	</ul>
</div>
