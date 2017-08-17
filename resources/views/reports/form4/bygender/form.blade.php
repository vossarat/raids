@extends('layouts.template')

@section('content')

<h1 class="page-header">Отчеты. Форма №4 по полу</h1>

<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading"> {{-- заголовок окна --}}
			Форма №4
			<a href="{{ route('index.index') }}" class="close" data-dismiss="alert" aria-hidden="true">&times;</a> {{-- х закрыть --}}
		</div>

		<div class="panel-body">
			<form class="form-horizontal" role="form" method="POST" action="/reports/form4bygender">
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
				
				<div class="form-group">{{-- region/lpu field --}}						
					<label for="region" class="col-md-3 col-md-offset-1 control-label">ЛПУ</label>							
					<div class="col-md-7">
						<select class="form-control" name="region">									
							@foreach($referenceRegion as $item)
								@if($item->id == 0)
									<option value="{{ $item->id }}">По всем регионам</option>
								@else
									<option value="{{ $item->id }}">{{ $item->name }}</option>
								@endif								
							@endforeach			
						</select>
					</div>
				</div>{{-- end region/lpu field --}} 
				
				<div class="form-group">
					<label for="radio" class="col-md-3 col-md-offset-1 control-label">Считать по:</label>
					<div class="col-md-2">	
						<label class="radio text-center">
							<input type="radio" name="calcBy" value="2"> Городу
						</label>
					</div>

					<div class="col-md-2">		
						<label class="radio">
							<input type="radio" name="calcBy" value="1"> Области
						</label>
					</div> 
					
					<div class="col-md-2">		
						<label class="radio">
							<input type="radio" name="calcBy" value="0" checked="checked"> Полный
						</label>
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