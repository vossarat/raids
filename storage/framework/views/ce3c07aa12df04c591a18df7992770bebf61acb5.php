<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">	
		<link rel="shortcut icon" href="../../assets/ico/favicon.ico">

		<title>
			<?php $__env->startSection('title'); ?>
			<?php echo e(isset($title) ? $title : 'Регистр AIDS'); ?>

			<?php echo $__env->yieldSection(); ?>
		</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
		
		<!-- Include Font-Awesome -->
		<link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">	
		
		<!-- additional CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('css/template.css')); ?>" />
		<link rel="stylesheet" href="<?php echo e(asset('css/sidebar.css')); ?>" /> 
		<link rel="stylesheet" href="<?php echo e(asset('css/topbar.css')); ?>" /> 
		
		
		<!-- Include Some Style -->
		<?php echo $__env->yieldPushContent('css'); ?>
		
	</head>

	<body>
	
		<?php $__env->startSection('topbar'); ?>
		    <?php echo $__env->make('layouts.topbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->yieldSection(); ?>
	
        <div class="container-fluid">
              
              <div class="row">       
              
              	 <div class="col-md-1 sidebar">	                	                
					<?php $__env->startSection('sidebar'); ?>
		                <?php echo $__env->make('layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo $__env->yieldSection(); ?>						    
            	</div>                                
				
				<div class="col-md-11 col-md-offset-1">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<?php echo $__env->yieldContent('content'); ?>
						</div>					
					</div>										
				</div>

               

            </div>
        </div>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
		<?php echo $__env->yieldPushContent('scripts'); ?>
		
		
	</body>
</html>