<div class="impuestoUnico index">
<h2>Impuesto Unico</h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('tramo');?></th>
	<th><?php echo $paginator->sort('tasa');?></th>
	<th><?php echo $paginator->sort('rebaja');?></th>
	<th><?php echo $paginator->sort('requisito');?></th>
	<th width="68px" class="actions">Acciones</th>
</tr>
<?php
$i = 0;
foreach ($impuestosUnico as $impuestoUnico):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $impuestoUnico['ImpuestoUnico']['tramo']; ?>
		</td>
		<td>
			<?php echo $impuestoUnico['ImpuestoUnico']['tasa']; ?>
		</td>
		<td>
			<?php echo $impuestoUnico['ImpuestoUnico']['rebaja']; ?>
		</td>
		<td>
			<?php echo $impuestoUnico['ImpuestoUnico']['requisito']; ?>
		</td>
		<td class="actions">			
			<?php echo $html->link(
				$html->image('b_edit.png', array('title' => 'Editar')), 
				array('action'=>'edit', $impuestoUnico['ImpuestoUnico']['tramo']), null, null, false
			); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
