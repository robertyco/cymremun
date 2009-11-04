<div class="afps index">
<h2>AFP</h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('nombre');?></th>
	<th><?php echo $paginator->sort('cotizacion');?></th>
	<th width="68px" class="actions">Acciones</th>
</tr>
<?php
$i = 0;
foreach ($afps as $afp):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $afp['Afp']['nombre']; ?>
		</td>
		<td>
			<?php echo $afp['Afp']['cotizacion']; ?>
		</td>
		<td class="actions">			
			<?php echo $html->link(
				$html->image('b_edit.png', array('title' => 'Editar')), 
				array('action'=>'edit', $afp['Afp']['id']), null, null, false
			); ?>
			<?php echo $html->link(
				$html->image('b_drop.png', array('title' => 'Borrar')), 
				array('action'=>'delete', $afp['Afp']['id']), null, 
				sprintf(__('Está seguro que desea borrar la AFP "%s"?', true), $afp['Afp']['nombre']), false
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
		<li><?php echo $html->link('Nueva A.F.P.', array('action'=>'add')); ?></li>
	</ul>
</div>
