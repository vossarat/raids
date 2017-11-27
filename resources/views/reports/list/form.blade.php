@extends('layouts.template')

@section('content')

<h1 class="page-header">Списки</h1>

<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading"> {{-- заголовок окна --}}
			Списки
			<a href="{{ route('index.index') }}" class="close" data-dismiss="alert" aria-hidden="true">&times;</a> {{-- х закрыть --}}
		</div>

		<div class="panel-body">
			<form class="form-horizontal" role="form" method="POST" action="/reports/list">
				{{ csrf_field() }}			
				
				<div class="form-group"> 
				
						{{-- startdate field --}}
						<label for="startdate" class="col-md-4 control-label">Отчетный период с</label>
						<div class="col-md-3">
							<input id="startdate" type="text" class="form-control" name="startdate" value="{{ $settings['startdate'] }}">
						</div>
						{{-- end startdate field --}}
						
						{{-- enddate field --}}
						<label for="enddate" class="col-md-1 control-label">по</label>
						<div class="col-md-3">
							<input id="enddate" type="text" class="form-control" name="enddate" value="{{ $settings['enddate'] }}">
						</div>
						{{-- end enddate field --}}

				</div>
				
				<div class="form-group">{{-- region/lpu field --}}						
					<label for="region" class="col-md-3 col-md-offset-1 control-label">ЛПУ</label>							
					<div class="col-md-7">
						<select class="form-control" name="region">									
							@foreach($referenceRegion as $item)
								@if($item->id == 0)
									<option value="{{ $item->id }}">По всем ЛПУ</option>
								@else
									<option value="{{ $item->id }}">{{ $item->name }}</option>
								@endif								
							@endforeach			
						</select>
					</div>
				</div>{{-- end region/lpu field --}} 
				
				<div class="form-group">{{-- code field --}}						
					<label for="code" class="col-md-3 col-md-offset-1 control-label">Код</label>							
					<div class="col-md-7">
						<select class="form-control" name="code">									
							<option value="0">По всем кодам</option>
							@foreach($referenceCode as $item)
								<option value="{{ $item->id }}">{{ $item->code.'-'.$item->name }}</option>
							@endforeach			
						</select>
					</div>
				</div>{{-- end code field --}} 
				
				<div class="form-group">{{-- diagnose field --}}						
					<label for="diagnose" class="col-md-3 col-md-offset-1 control-label">Диагноз</label>							
					<div class="col-md-7">
						<select class="form-control" name="diagnose">									
							<option value="0">По всем диагнозам</option>
							@foreach($referenceDiagnose as $item)
								<option value="{{ $item->id }}">{{ $item->name }}</option>
							@endforeach			
						</select>
					</div>
				</div>{{-- end diagnose field --}}
				
				<div class="form-group">{{-- diagnose field --}}						
					<label for="sex" class="col-md-3 col-md-offset-1 control-label">Пол</label>							
					<div class="col-md-7">
						<select class="form-control" name="sex">									
							<option value="0">без учета пола</option>
							<option value="1">не указано</option>
							<option value="2">мужской</option>
							<option value="3">женский</option>
						</select>
					</div>
				</div>{{-- end diagnose field --}}
				
				<div class="form-group">
					<div class="col-md-5 col-md-offset-4">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="dublicate" value="1">Только двойники
							</label>
						</div>
					</div>
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