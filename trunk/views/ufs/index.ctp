<div class="UF index">
<h2>U.F.</h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('fecha');?></th>
	<th><?php echo $paginator->sort('valor');?></th>
	<?php if ($Auth['User']['tipo'] != 'consultor') { ?>
	<th width="68px" class="actions">Acciones</th>
	<?php } ?>
</tr>
<?php
$i = 0;
foreach ($Ufs as $Uf):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $Uf['Uf']['fecha']; ?>
		</td>
		<td>
			<?php echo $Uf['Uf']['valor']; ?>
		</td>
		<?php if ($Auth['User']['tipo'] != 'consultor') { ?>
		<td class="actions">			
			<?php echo $html->link(
				$html->image('b_edit.png', array('title' => 'Editar')), 
				array('action'=>'edit', $Uf['Uf']['id']), null, null, false
			); ?>
			<?php echo $html->link(
				$html->image('b_drop.png', array('title' => 'Borrar')), 
				array('action'=>'delete', $Uf['Uf']['id']), null, 
				sprintf(__('Está seguro que desea borrar la UF del mes "%s"?', true), $Uf['Uf']['fecha']), false
			); ?>
		</td>
		<?php } ?>
	</tr>
<?php endforeach; ?>
</table>
</div>

<?php if ($Auth['User']['tipo'] != 'consultor') { ?>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Nueva U.F.', array('action'=>'add')); ?></li>
	</ul>
</div>
<?php } ?>
