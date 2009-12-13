<?php if ($session->check('Empresa.id')) { ?>

<div class="afps index">
<h2>Planillas: A.F.P.</h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('nombre');?></th>
	<th width="72px" class="actions">Imprimir</th>
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
		<td class="actions">			
			<?php 
				echo $html->image(
					'imprimir.gif', array('title' => 'Imprimir', 'url' => array('action'=>'imprimirAfp', $afp['Afp']['id']))
				);
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>

<div class="actions">
	<ul>
		<li><?php echo $html->link('Imprimir Todas', array('action'=>'imprimirAfp')); ?></li>
	</ul>
</div>

<?php } ?>