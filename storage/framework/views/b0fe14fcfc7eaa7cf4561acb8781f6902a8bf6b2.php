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
		<link rel="stylesheet" href="<?php echo e(asset('css/fullscreen.css')); ?>" />
		
		<!-- Include Some Style -->
		<?php echo $__env->yieldPushContent('css'); ?>
		
	</head>

	<body>

        <div class="container-fluid">              
              <div class="row">       
				<?php echo $__env->yieldContent('content'); ?>
	        </div>
	    </div>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
		<?php echo $__env->yieldPushContent('scripts'); ?>		
		
	</body>
</html>