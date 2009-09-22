<div class="empresas view">
<h2><?php  __('Empresa');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empresa['Empresa']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rut'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empresa['Empresa']['rut']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empresa['Empresa']['nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Actividad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empresa['Empresa']['actividad']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Direccion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empresa['Empresa']['direccion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Comuna'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empresa['Empresa']['comuna']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ciudad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empresa['Empresa']['ciudad']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Region'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empresa['Empresa']['region']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telefono'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empresa['Empresa']['telefono']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fax'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empresa['Empresa']['fax']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empresa['Empresa']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rep Legal Rut'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empresa['Empresa']['rep_legal_rut']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rep Legal Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empresa['Empresa']['rep_legal_nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empresa['Empresa']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empresa['Empresa']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Empresa', true), array('action'=>'edit', $empresa['Empresa']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Empresa', true), array('action'=>'delete', $empresa['Empresa']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $empresa['Empresa']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Empresas', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Empresa', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Empleados', true), array('controller'=> 'empleados', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Empleado', true), array('controller'=> 'empleados', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Empleados');?></h3>
	<?php if (!empty($empresa['Empleado'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Rut'); ?></th>
		<th><?php __('Apell Paterno'); ?></th>
		<th><?php __('Apell Materno'); ?></th>
		<th><?php __('Nombres'); ?></th>
		<th><?php __('Direccion'); ?></th>
		<th><?php __('Comuna'); ?></th>
		<th><?php __('Ciudad'); ?></th>
		<th><?php __('Telefono'); ?></th>
		<th><?php __('Celular'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($empresa['Empleado'] as $empleado):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $empleado['id'];?></td>
			<td><?php echo $empleado['rut'];?></td>
			<td><?php echo $empleado['apell_paterno'];?></td>
			<td><?php echo $empleado['apell_materno'];?></td>
			<td><?php echo $empleado['nombres'];?></td>
			<td><?php echo $empleado['direccion'];?></td>
			<td><?php echo $empleado['comuna'];?></td>
			<td><?php echo $empleado['ciudad'];?></td>
			<td><?php echo $empleado['telefono'];?></td>
			<td><?php echo $empleado['celular'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'empleados', 'action'=>'view', $empleado['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'empleados', 'action'=>'edit', $empleado['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'empleados', 'action'=>'delete', $empleado['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $empleado['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Empleado', true), array('controller'=> 'empleados', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
