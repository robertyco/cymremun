<?php if ($session->check('Empresa.id')) { ?>

<div class="empleados index">
<h2>Liquidaciones</h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('RUT','rut');?></th>
	<th><?php echo $paginator->sort('Apellido', 'apell_paterno');?></th>
	<th><?php echo $paginator->sort('Nombre', 'nombres');?></th>
	<th><?php echo $paginator->sort('Dirección','direccion');?></th>
	<th><?php echo $paginator->sort('ciudad');?></th>
	<th><?php echo $paginator->sort('telefono');?></th>
	<th width="72px" class="actions">Acciones</th>
</tr>
<?php
$i = 0;
foreach ($empleados as $empleado):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $html->link($empleado['Empleado']['rut'], array('controller' => 'Empleados', 'action'=>'view', $empleado['Empleado']['id'])); ?>
		</td>
		<td>
			<?php echo $empleado['Empleado']['apell_paterno']; ?>
		</td>
		<td>
			<?php echo $empleado['Empleado']['nombres']; ?>
		</td>
		<td>
			<?php echo $empleado['Empleado']['direccion']; ?>
		</td>
		<td>
			<?php echo $empleado['Empleado']['ciudad']; ?>
		</td>
		<td>
			<?php echo $empleado['Empleado']['telefono']; ?>
		</td>
		<td class="actions">			
			<?php 
			if ($Auth['User']['tipo'] != 'consultor') {
				echo $html->image(
					'b_edit.png', array('title' => 'Editar liquidación', 'url' => array('controller' => 'EmpleadosHaberesDescuentos', 'action'=>'addHdEmpleado', $empleado['Empleado']['id']))
				);
				if ($empleado['Empleado']['liquida'] == 1) {
					echo $html->link(
						$html->image('b_drop.png', array('title' => 'Borrar')), 
						array('action'=>'delete', $empleado['Empleado']['liquidaId']), null, 
						sprintf('¿Está seguro que desea borrar la liquidación del empleado "%s"?', 
							$empleado['Empleado']['nombres'].' '.$empleado['Empleado']['apell_paterno']), false
					);
				}
			}
			if ($empleado['Empleado']['liquida'] == 1) {
				echo $html->image(
					'imprimir.gif', array('title' => 'Imprimir', 'url' => array('action'=>'imprimir', $empleado['Empleado']['id']))
				);
			}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>

<div class="actions">
	<ul>
		<li><?php echo $html->link('Imprimir liquidaciones', array('action'=>'imprimir')); ?></li>
	</ul>
</div>

<?php } ?>