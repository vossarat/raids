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
				
				<div class="form-group">{{-- cutaway field --}}						
					<label for="cutaway" class="col-md-3 col-md-offset-1 control-label">В разрезе</label>
					<div class="col-md-7">
						<select class="form-control" name="cutaway" id="cutaway">
								<option value="1">ЛПУ</option>
								<option value="2">Местожительство</option>
						</select>
					</div>
				</div>{{--  cutaway field --}} 
				
				<div class="form-group" id="lpu">{{-- region/lpu field --}}						
					<label for="lpu_id" class="col-md-3 col-md-offset-1 control-label">ЛПУ</label>							
					<div class="col-md-7">
						<select class="form-control" name="lpu_id" id="lpu_id">
								{{-- <option value="0" data-city="0" >По всем регионам</option>								
								<option value="0" data-city="1" >По всем регионам</option>									
								<option value="0" data-city="2" >По всем регионам</option> 	--}}							
							@foreach($referenceRegion as $item)
								<option value="{{ $item->id }}" data-city="{{ $item->city_id }}">{{ $item->name }}</option>
							@endforeach			
						</select>
					</div>
				</div>{{-- end region/lpu field --}}
				
				<div class="form-group hide" id="residences">{{-- residences field --}}						
					<label for="residences" class="col-md-3 col-md-offset-1 control-label">Местожительство</label>
					<div class="col-md-7">
						<select class="form-control" name="residences" id="residences_id">
							@foreach($referenceCity as $item)
								<option value="{{ $item->id }}">{{ $item->name }}</option>
							@endforeach			
						</select>
					</div>
				</div>{{-- end residences field --}} 
				
				
				{{--				
				<div class="form-group">
					<label for="radio" class="col-md-3 col-md-offset-1 control-label">Группа:</label>
					<div class="col-md-3">	
						<label class="radio text-center">
							<input type="radio" name="calcBy" value="2"> Городские ЛПУ
						</label>
					</div>

					<div class="col-md-2">		
						<label class="radio">
							<input type="radio" name="calcBy" value="1"> Районы
						</label>
					</div> 
					
					<div class="col-md-2">		
						<label class="radio">
							<input type="radio" name="calcBy" value="0" checked="checked"> ИТОГО
						</label>
					</div> 
				</div>
				--}}
				
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
<script src="{{ asset('js/report/choice_cutaway.js') }}"></script> {{-- в разрезе: ЛПУ / Местожительство --}}
@endpush
@endsection