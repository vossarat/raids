

<?php $__env->startSection('content'); ?>
<h1 class="page-header">__________________</h1>

<?php if(Session::has('message')): ?>
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<?php echo e(Session::get('message')); ?>

</div>
<?php endif; ?>

<div class="form-group">
	<div class="row">
		<form class="form-inline" role="form" method="POST" action="<?php echo e(route('addtube')); ?>" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>


			<div class="form-group">					
				<div class="col-md-4">
					<button type="submit" class="btn btn-primary btn-lg">
						Принять
					</button>
				</div>
			</div>
			
			<div class="form-group">			
				<div class="col-md-4">
					<input type="file" name="filexls"/>
				</div>
			</div>
		</form>
	</div>
</div>

<table id="indexTable" class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>ИНН</th>
			<th>Фамилия И.О.</th>
			<th>Пол</th>
			<th>Дата рождения</th>
			<th colspan="2">Действие</th>
		</tr>
	</thead>
	<tbody>
		<?php $__currentLoopData = $viewdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tube): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td><?php echo e($tube->number); ?></td>
			<td><?php echo e($tube->iinumber); ?></td>
			<td><?php echo e($tube->surname); ?></td>
			<td><?php echo e($tube->sex[0]->name); ?></td>
			<td> 01-01-<?php echo e($tube->birthday); ?></td>
			<td>     
                <form action="<?php echo e(route('edittube', $tube->id)); ?>">
                	<button type="submit"><i class="fa fa-edit"></i></button>
                </form>
            </td>
			<td>
				<form action="<?php echo e(route('destroytube', $tube->id)); ?>" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <?php echo e(csrf_field()); ?>

                    <button type="submit"><i class="fa fa-trash"></i></button>
                </form>
           </td>
           
            
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	</tbody>
</table>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('js/jquery.maskedinput.js')); ?>"></script>
<script src="<?php echo e(asset('js/maskinputdate.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>