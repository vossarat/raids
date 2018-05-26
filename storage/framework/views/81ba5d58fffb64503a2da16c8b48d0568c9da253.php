
<form class="form-inline" role="form" method="GET" action="">
	
	<input id="number" type="text" class="form-control" name="number" value="<?php echo e(isset($filterNumber) ? $filterNumber : ''); ?>" placeholder="Номер">
		
	<input id="surname" type="text" class="form-control" name="surname" value="<?php echo e($filterSurname); ?>" placeholder="Фамилия">
	
	<select class="form-control" name="code">
		<option value="">Код</option>
		<?php $__currentLoopData = $referenceCode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if(isset($filterCode)): ?>
				<?php if($filterCode == $item->id): ?>
					<option selected value="<?php echo e($item->id); ?>"><?php echo e($item->code); ?></option>
				<?php else: ?>
					<option value="<?php echo e($item->id); ?>"><?php echo e($item->code); ?></option>
				<?php endif; ?>
			<?php else: ?>
					<option value="<?php echo e($item->id); ?>"><?php echo e($item->code); ?></option>
			<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>

	<select class="form-control" name="diagnose">
		<option value="">Диагноз</option>
		<?php $__currentLoopData = $referenceDiagnose; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if(isset($filterDiagnose)): ?>
				<?php if($filterDiagnose == $item->id): ?>
					<option selected value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
				<?php else: ?>
					<option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
				<?php endif; ?>
			<?php else: ?>
					<option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
			<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>
	
	<select class="form-control" name="region">
		<option value="">Район/ЛПУ</option>
		<?php $__currentLoopData = $referenceRegion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemRegion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if(isset($filterRegion)): ?>
				<?php if($filterRegion == $itemRegion->id): ?>
					<option selected value="<?php echo e($itemRegion->id); ?>"><?php echo e($itemRegion->name); ?></option>
				<?php else: ?>
					<option value="<?php echo e($itemRegion->id); ?>"><?php echo e($itemRegion->name); ?></option>
				<?php endif; ?>
			<?php else: ?>
					<option value="<?php echo e($itemRegion->id); ?>"><?php echo e($itemRegion->name); ?></option>
			<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>

	<button type="submit" class="btn btn-primary" name="filter" value="filter"><i class="fa fa-filter"></i>Фильтр</button>
	<button type="submit" class="btn btn-warning" name="reset" value="reset"><i class="fa fa-close"></i></button>
	
</form>