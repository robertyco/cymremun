<?php if ($session->check('Empresa.id')) { ?>

<div class="isapres index">
<h2>Planillas: Isapre</h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('nombre');?></th>
	<th width="72px" class="actions">Imprimir</th>
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
			<?php 
				echo $html->image(
					'imprimir.gif', array('title' => 'Imprimir', 'url' => array('action'=>'imprimirIsapre', $isapre['Isapre']['id']))
				);
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>

<div class="actions">
	<ul>
		<li><?php echo $html->link('Imprimir Todas', array('action'=>'imprimirIsapre')); ?></li>
	</ul>
</div>

<?php } ?>