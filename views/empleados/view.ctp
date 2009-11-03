<div class="empleados view">
<h2><?php  __('Empleado');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>>ID</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empleado['Empleado']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>R.U.T.</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empleado['Empleado']['rut']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Nombre</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empleado['Empleado']['apell_paterno'].' '.$empleado['Empleado']['apell_materno'].' '.
						$empleado['Empleado']['nombres']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Dirección</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empleado['Empleado']['direccion'].', '.$empleado['Empleado']['comuna'].', '.
						$empleado['Empleado']['ciudad']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telefono'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empleado['Empleado']['telefono']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Celular'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empleado['Empleado']['celular']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Fecha de ingreso</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empleado['Empleado']['fecha_ingreso']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Fecha de retiro</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empleado['Empleado']['fecha_retiro']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Sueldo</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empleado['Empleado']['sueldo_base']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>A.F.P.</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($empleado['Prevision']['Afp']['nombre'], array('controller'=> 'afps', 'action'=>'view', $empleado['Prevision']['Afp']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Cotización voluntaria</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empleado['Prevision']['cotizacion_voluntaria']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Ahorro voluntario</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empleado['Prevision']['ahorro_voluntario']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Salud</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($empleado['Salud']['Isapre']['nombre'], array('controller'=> 'isapres', 'action'=>'view', $empleado['Salud']['Isapre']['id'])); ?>
			&nbsp;
		</dd>
		<?php if ($empleado['Salud']['valor_plan']) {?>
			<dt<?php if ($i % 2 == 0) echo $class;?>>Valor del plan</dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $empleado['Salud']['valor_plan'].' '.$empleado['Salud']['valor_tipo']; ?>
				&nbsp;
			</dd>
		<?php } ?>
		
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(
				'Asignar haberes y descuentos', 
				array('controller' => 'EmpleadosHaberesDescuentos', 'action'=>'addHdEmpleado', $empleado['Empleado']['id'])
			); ?> </li>
	</ul> <br /><br />
	<ul>
		<li><?php echo $html->link('Editar', array('action'=>'edit', $empleado['Empleado']['id'])); ?> </li>
		<li><?php echo $html->link('Borrar', array('action'=>'delete', $empleado['Empleado']['id']), null, 
			sprintf('¿Está seguro que desea borrar al empleado "%s"?', 
			$empleado['Empleado']['nombres'].' '.$empleado['Empleado']['apell_paterno'])); ?> </li>		
			
		<li><?php echo $html->link('Agregar empleado', array('action'=>'add')); ?> </li>
	</ul>
</div>
