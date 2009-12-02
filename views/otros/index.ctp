<div class="afps index">
<h2>Otros</h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('nombre');?></th>
	<th><?php echo $paginator->sort('valor');?></th>
	<?php if ($Auth['User']['tipo'] != 'consultor') { ?>
	<th width="68px" class="actions">Acciones</th>
	<?php } ?>
</tr>
<?php
$i = 0;
foreach ($otros as $otro):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $otro['Otro']['nombre']; ?>
		</td>
		<td>
			<?php echo $otro['Otro']['valor']; ?>
		</td>
		<?php if ($Auth['User']['tipo'] != 'consultor') { ?>
		<td class="actions">			
			<?php echo $html->link(
				$html->image('b_edit.png', array('title' => 'Editar')), 
				array('action'=>'edit', $otro['Otro']['id']), null, null, false
			); ?>
		</td>
		<?php } ?>
	</tr>
<?php endforeach; ?>
</table>
</div>
