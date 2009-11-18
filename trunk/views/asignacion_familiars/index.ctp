<div class="asignacionFamiliar index">
<h2>Asignación Familiar</h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('tramo');?></th>
	<th><?php echo $paginator->sort('monto');?></th>
	<th><?php echo $paginator->sort('requisito');?></th>
	<?php if ($Auth['User']['tipo'] != 'consultor') { ?>
	<th width="68px" class="actions">Acciones</th>
	<?php } ?>
</tr>
<?php
$i = 0;
foreach ($asignacionesFamiliar as $asignacionFamiliar):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $asignacionFamiliar['AsignacionFamiliar']['tramo']; ?>
		</td>
		<td>
			<?php echo $asignacionFamiliar['AsignacionFamiliar']['monto']; ?>
		</td>
		<td>
			<?php echo $asignacionFamiliar['AsignacionFamiliar']['requisito']; ?>
		</td>
		<?php if ($Auth['User']['tipo'] != 'consultor') { ?>
		<td class="actions">			
			<?php echo $html->link(
				$html->image('b_edit.png', array('title' => 'Editar')), 
				array('action'=>'edit', $asignacionFamiliar['AsignacionFamiliar']['tramo']), null, null, false
			); ?>
		</td>
		<?php } ?>
	</tr>
<?php endforeach; ?>
</table>
</div>
