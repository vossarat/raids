<ul class="nav">
	<li>
		<a href="/">
			<i class="fa fa-table fa-4x"></i>
			<p>Регистр</p>
		</a>
	</li>

	<li>
		<a href="<?php echo e(route('index.create')); ?>">
			<i class="fa fa-file-text-o fa-4x"></i>

			<p>Добавить карту</p>
		</a>
	</li>
	
	<li>
		<a href="<?php echo e(route('settings')); ?>">
			<i class="fa fa-wrench fa-4x"></i>

			<p>Установки</p>
		</a>
	</li>
	<?php if(Auth::user()->id == 3): ?>
	<li>
		<a href="<?php echo e(route('tube')); ?>">
			<i class="fa fa-hospital-o fa-4x"></i> 

			<p>____</p>
		</a>
	</li>	
	<?php endif; ?>
	
</ul>