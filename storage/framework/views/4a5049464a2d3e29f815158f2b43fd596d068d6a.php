

<?php $__env->startSection('content'); ?>
<h1 class="page-header">Регистр</h1>

<div class="form-group">
	<form action="<?php echo e(route('index.create')); ?>">

			<button type="submit" class="btn btn-primary">
				<i class="fa fa-plus"></i> Добавить карту
			</button>

	</form>
</div>

<?php if(Session::has('message')): ?>
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<?php echo e(Session::get('message')); ?>

</div>
<?php endif; ?>

<?php echo $__env->make('index.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 

<table id="indexTable" class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Фамилия И.О.</th>
			<th>Пол</th>
			<th>Дата рождения</th>
			<th>Код</th>
			<th>Дата</th>
			<!--<th>Регион</th>-->
			<th colspan="2">Действие</th>
		</tr>
	</thead>
	<tbody>
		<?php $__currentLoopData = $viewdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td><?php echo e($patient->number); ?></td>
			<td><?php echo e($patient->surname.' '.mb_substr($patient->name,0,1,"UTF-8").mb_substr($patient->middlename,0,1,"UTF-8")); ?></td>
			<td><?php echo e($patient->sex[0]->name); ?></td>
			<td><?php echo e(date('d-m-Y',strtotime($patient->birthday))); ?></td>
			<td><?php echo e($patient->code[0]->code); ?></td>
			<td><?php echo e($patient->grantdate->format('d-m-Y')); ?></td>
			<!--<td></td>-->
			<td>     
                <form action="<?php echo e(route('index.edit', $patient->id)); ?>">
                	<button type="submit" <?php echo e($patient->duplicate ||  $patient->mainduplicate ? 'disabled': ''); ?> class="btn-action"><i class="fa fa-edit"></i></button>
                </form>
            </td>
			<td>
				<form action="<?php echo e(route('index.destroy', $patient->id)); ?>" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <?php echo e(csrf_field()); ?>

                    <button type="submit" <?php echo e($patient->duplicate ||  $patient->mainduplicate ? 'disabled': ''); ?> class="btn-action"><i class="fa fa-trash"></i></button>
                </form>
           </td>
           
            
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	</tbody>
</table>

<?php echo e($viewdata->appends([
						'number' => isset($filterNumber) ? $filterNumber :'',
						'surname' => isset($filterSurname) ? $filterSurname :'',
						'code' => isset($filterCode) ? $filterCode :'',
						'diagnose' => isset($filterDiagnose) ? $filterDiagnose:'',
						'region' => isset($filterRegion) ? $filterRegion:'',
						'filter' => 'filter',
						])->links()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>