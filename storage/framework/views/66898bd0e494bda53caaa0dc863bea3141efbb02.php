<div class="form-group">
	<div class="<?php echo e($errors->has('number') ? ' has-error' : ''); ?>">		
		
		<label for="number" class="col-md-2 control-label">Регистрационный номер</label>
		
		<div class="col-md-2">
			<input id="number" type="text" class="form-control" name="number" value="<?php echo e(isset($newNumber) ? $newNumber : old('number')); ?>">
			<?php if($errors->has('number')): ?>
			<span class="help-block">
				<strong>
					<?php echo e($errors->first('number')); ?>

				</strong>
			</span>
			<?php endif; ?>
		</div>
		
	</div>
	
	
	
	<div class="<?php echo e($errors->has('iinumber') ? ' has-error' : ''); ?>">		
		
		<label for="iinumber" class="col-md-2 control-label">ИИН</label>
		
		<div class="col-md-3">
			<input id="iinumber" type="text" class="form-control" name="iinumber" value="<?php echo e(isset($viewdata->iinumber) ? $viewdata->iinumber : old('myfield')); ?>">
			<?php if($errors->has('iinumber')): ?>
			<span class="help-block">
				<strong>
					<?php echo e($errors->first('iinumber')); ?>

				</strong>
			</span>
			<?php endif; ?>
		</div>
		
	</div>
</div> 


<div class="form-group">
	<div class="<?php echo e($errors->has('surname') ? ' has-error' : ''); ?>"> 
		
		<label for="surname" class="col-md-2 control-label">Фамилия</label>

		<div class="col-md-2">
			<input id="surname" type="text" class="form-control" name="surname" value="<?php echo e(isset($viewdata->surname) ? $viewdata->surname : old('surname')); ?>">
			<?php if($errors->has('surname')): ?>
			<span class="help-block">
				<strong>
					<?php echo e($errors->first('surname')); ?>

				</strong>
			</span>
			<?php endif; ?>
		</div>
		
	</div>
	
	<label for="name" class="col-md-1 control-label">Имя</label>
	<div class="col-md-2">
		<input id="name" type="text" class="form-control" name="name" value="<?php echo e(isset($viewdata->name) ? $viewdata->name : old('name')); ?>">
	</div>
	
	<label for="middlename" class="col-md-1 control-label">Отчество</label>
	<div class="col-md-2">
		<input id="middlename" type="text" class="form-control" name="middlename" value="<?php echo e(isset($viewdata->middlename) ? $viewdata->middlename : old('middlename')); ?>">
	</div>
	 
</div> 	

<div class="form-group">
	<div class="<?php echo e($errors->has('birthday') ? ' has-error' : ''); ?>"> 
		
		<label for="birthday" class="col-md-2 control-label">Дата рождения</label>
		
		<div class="col-md-2">
		<input id="birthday" type="text" class="form-control" name="birthday" value="<?php echo e(isset($viewdata->birthday) ? date('d-m-Y', strtotime($viewdata->birthday)):''); ?>">
			<?php if($errors->has('birthday')): ?>
			<span class="help-block">
				<strong>
					<?php echo e($errors->first('birthday')); ?>

				</strong>
			</span>
			<?php endif; ?>
		</div>
	</div>
	
		<div class="<?php echo e($errors->has('sex_id') ? ' has-error' : ''); ?>"> 
		
		<label for="sex_id" class="col-md-2 control-label">Пол</label>		
		
		<div class="col-md-3">
		<select class="form-control" name="sex_id">		
			<?php $__currentLoopData = $referenceSex; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if(isset($viewdata)): ?>
					<option <?php echo e($viewdata->sex_id == $item->id ? 'selected' : ''); ?> value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
				<?php else: ?>
					<option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>			
		</select>

		<?php if($errors->has('sex_id')): ?>
		<span class="help-block">
			<strong>
				<?php echo e($errors->first('sex_id')); ?>

			</strong>
		</span>
		<?php endif; ?>
		</div>
	</div>
	
</div>

<div class="form-group">

	<div class="<?php echo e($errors->has('grantdate') ? ' has-error' : ''); ?>"> 
		
		<label for="grantdate" class="col-md-2 control-label">Дата обследования</label>		
		
		<div class="col-md-2">
		<input id="grantdate" type="text" class="form-control" name="grantdate" value="<?php echo e(isset($viewdata->grantdate) ? date('d-m-Y', strtotime($viewdata->grantdate)) : date('d-m-Y')); ?>">
			<?php if($errors->has('grantdate')): ?>
			<span class="help-block">
				<strong>
					<?php echo e($errors->first('grantdate')); ?>

				</strong>
			</span>
			<?php endif; ?>
		</div>
	</div>	

	<div class="<?php echo e($errors->has('code_id') ? ' has-error' : ''); ?>"> 
		
		<label for="code_id" class="col-md-2 control-label">Код</label>		
		
		<div class="col-md-5">
		<select class="form-control" name="code_id" id="code_id">		
			<?php $__currentLoopData = $referenceCode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if(isset($viewdata)): ?>
					<option <?php echo e($viewdata->code_id == $item->id ? 'selected' : ''); ?> value="<?php echo e($item->id); ?>"><?php echo e($item->code.'-'.$item->name); ?></option>
				<?php else: ?>
					<option value="<?php echo e($item->id); ?>"><?php echo e($item->code.'-'.$item->name); ?></option>					
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>			
		</select>
		
		<?php if($errors->has('code_id')): ?>
		<span class="help-block">
			<strong>
				<?php echo e($errors->first('code_id')); ?>

			</strong>
		</span>
		<?php endif; ?>
		</div>
	</div>
</div>	

<div class="form-group">
	<div class="<?php echo e($errors->has('city_id') ? ' has-error' : ''); ?>"> 
		
		<label for="city_id" class="col-md-2 control-label">Место жительства</label>		
		
		<div class="col-md-2">
		<select class="form-control" name="city_id" id="city_id">		
			<?php $__currentLoopData = $referenceCity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if(isset($viewdata)): ?>
					<option <?php echo e($viewdata->city_id == $item->id ? 'selected' : ''); ?> value="<?php echo e($item->id); ?>" data-city="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
				<?php else: ?>					
					<option value="<?php echo e($item->id); ?>" <?php if(old('city_id') == $item->id): ?> <?php echo e('selected'); ?> <?php endif; ?> data-city="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>			
		</select>

		<?php if($errors->has('city_id')): ?>
		<span class="help-block">
			<strong>
				<?php echo e($errors->first('city_id')); ?>

			</strong>
		</span>
		<?php endif; ?>
		</div>
	</div>
	
	<div class="<?php echo e($errors->has('region_id') ? ' has-error' : ''); ?>"> 
		
		<label for="region_id" class="col-md-1 control-label">ЛПУ</label>		
		
		<div class="col-md-2">
		<select class="form-control" name="region_id" id="region_id">		
			<?php $__currentLoopData = $referenceRegion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if(isset($viewdata)): ?>
					<option <?php echo e($viewdata->region_id == $item->id ? 'selected' : ''); ?> value="<?php echo e($item->id); ?>" data-city="<?php echo e($item->city_id); ?>"><?php echo e($item->name); ?></option>
				<?php else: ?>
					<option value="<?php echo e($item->id); ?>" data-city="<?php echo e($item->city_id); ?>"><?php echo e($item->name); ?></option>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>			
		</select>

		<?php if($errors->has('region_id')): ?>
		<span class="help-block">
			<strong>
				<?php echo e($errors->first('region_id')); ?>

			</strong>
		</span>
		<?php endif; ?>
		</div>
	</div>
	
	<div class="<?php echo e($errors->has('diagnose_id') ? ' has-error' : ''); ?>"> 
		
		<label for="diagnose_id" class="col-md-1 control-label">Диагноз</label>		
		
		<div class="col-md-3">
		<select class="form-control" name="diagnose_id" id="diagnose_id">		
			<?php $__currentLoopData = $referenceDiagnose; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if(isset($viewdata)): ?>
					<option <?php echo e($viewdata->diagnose_id == $item->id ? 'selected' : ''); ?> value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
				<?php else: ?>
					<option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>			
		</select>

		<?php if($errors->has('diagnose_id')): ?>
		<span class="help-block">
			<strong>
				<?php echo e($errors->first('diagnose_id')); ?>

			</strong>
		</span>
		<?php endif; ?>
		</div>
	</div>
	
</div>

<div class="form-group">

		<div class="<?php echo e($errors->has('town_village_id') ? ' has-error' : ''); ?>"> 
		
		<label for="town_village_id" class="col-md-2 control-label">Житель </label>			
				
		
		<div class="col-md-2">
		<select class="form-control" name="town_village_id">		
			<?php $__currentLoopData = $referenceTownVillage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if(isset($viewdata)): ?>
					<option <?php echo e($viewdata->town_village_id == $item->id ? 'selected' : ''); ?> value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
				<?php else: ?>
					<option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>			
		</select>

		<?php if($errors->has('town_village_id')): ?>
		<span class="help-block">
			<strong>
				<?php echo e($errors->first('town_village_id')); ?>

			</strong>
		</span>
		<?php endif; ?>
		</div>
	</div>

</div>

<div class="form-group">
	<div class="col-md-3 col-md-offset-2">
		<div class="checkbox">
			<label>
				<?php if(isset($viewdata)): ?>
				<input type="checkbox" name="imunnoblot" value="1" <?php echo e($viewdata->imunnoblot ? 'checked' : ''); ?>> Имунноблот
				<?php else: ?>
				<input type="checkbox" name="imunnoblot" value="1" <?php echo e(old('imunnoblot') ? 'checked' : ''); ?>> Имунноблот
				<?php endif; ?>
			</label>
		</div>
	</div>
</div>

<div class="form-group">
		<label for="user_id" class="col-md-2 control-label">Зарегистрировал</label>
		<div class="col-md-3">
			<input type="text" class="form-control" value="<?php echo e(isset($viewdata->user->name) ? $viewdata->user->name : Auth::user()->name); ?>" readonly>
		</div> 
</div> 

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('js/jquery.maskedinput.js')); ?>"></script>
<script src="<?php echo e(asset('js/maskinputdate.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('js/index/filter_city_on_region.js')); ?>"></script> -->
<?php if(Auth::user()->id == 3): ?>
<script src="<?php echo e(asset('js/index/filter_code_on_diagnose.js')); ?>"></script>
<?php endif; ?>

<?php $__env->stopPush(); ?>