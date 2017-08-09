@extends('layouts.template')

@section('content')

<h1 class="page-header">Отчеты. Количество обследованных по региону (ЛПУ)</h1>

<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading"> {{-- заголовок окна --}}
			Количество обследованных по региону (ЛПУ)
			<a href="{{ route('index.index') }}" class="close" data-dismiss="alert" aria-hidden="true">&times;</a> {{-- х закрыть --}}
		</div>

		<div class="panel-body">
			<form class="form-horizontal" role="form" method="POST" action="/reports/countbyregion">
				{{ csrf_field() }}			
				
				<div class="form-group"> 
				
						{{-- startdate field --}}
						<label for="startdate" class="col-md-4 control-label">Отчетный период с</label>
						<div class="col-md-3">
							<input id="startdate" type="text" class="form-control" name="startdate" value="">
						</div>
						{{-- end startdate field --}}
						
						{{-- enddate field --}}
						<label for="enddate" class="col-md-1 control-label">по</label>
						<div class="col-md-3">
							<input id="enddate" type="text" class="form-control" name="enddate" value="">
						</div>
						{{-- end enddate field --}}

				</div>
				
				
				
				<div class="form-group">
					<label for="radio" class="col-md-3 col-md-offset-1 control-label">Вывод на:</label>
					<div class="col-md-2">	
						<label class="radio text-center">
							<input type="radio" name="output" value="toScreen" checked="checked"> Экран
						</label>
					</div>

					<div class="col-md-2">		
						<label class="radio">
							<input type="radio" name="output" value="toExcel"> Excel
						</label>
					</div> 
				</div> 
				
				<div class="form-group">
					<div class="col-md-3 col-md-offset-3">
						<button type="submit" class="btn btn-primary">
							Сформировать
						</button>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>

@push('scripts')
<script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('js/maskinputdate.js') }}"></script>
@endpush
@endsection