

<?php $__env->startSection('content'); ?>

<h1 class="page-header">Картотека</h1>
<div class="panel panel-default">
	<div class="panel-heading"> 
		Добавление информации по пациенту из плашки
		<a href="<?php echo e(url()->previous()); ?>" class="close" data-dismiss="alert" aria-hidden="true">&times;</a> 
	</div>

	<div class="panel-body">
		<form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('storetube')); ?>">                       
			<?php echo e(csrf_field()); ?>

			<input type="hidden" name="_method" value="put"/>

			<?php echo $__env->make('tube.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

			<div class="form-group">
				<div class="col-md-3 col-md-offset-1">
					<button type="submit" class="btn btn-primary">
						Перенести в картотеку
					</button>
				</div>
			</div>

		</form>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>