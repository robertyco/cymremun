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
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Apell Paterno'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empleado['Empleado']['apell_paterno']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Apell Materno'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empleado['Empleado']['apell_materno']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombres'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empleado['Empleado']['nombres']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Dirección</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empleado['Empleado']['direccion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Comuna'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empleado['Empleado']['comuna']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ciudad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empleado['Empleado']['ciudad']; ?>
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
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Empresa'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($empleado['Empresa']['nombre'], array('controller'=> 'empresas', 'action'=>'view', $empleado['Empresa']['id'])); ?>
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
		<dt<?php if ($i % 2 == 0) echo $class;?>>Valor del plan</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empleado['Salud']['valor_plan'].' '.$empleado['Salud']['valor_tipo']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Editar empleado', array('action'=>'edit', $empleado['Empleado']['id'])); ?> </li>
		<li><?php echo $html->link('Borrar empleado', array('action'=>'delete', $empleado['Empleado']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $empleado['Empleado']['id'])); ?> </li>
		<li><?php echo $html->link('Listar empleados', array('action'=>'index')); ?> </li>
		<li><?php echo $html->link('Agregar empleado', array('action'=>'add')); ?> </li>
	</ul>
</div>
