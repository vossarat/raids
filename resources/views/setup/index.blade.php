@extends('layouts.template')

@section('content')
<h1 class="page-header">Установка программы</h1>

<div class="row"> {{-- создать рабочую таблицу и справочники --}}
	<form class="form-inline" role="form" method="POST" action="{{ url('/setup/make/table') }}">
		{{ csrf_field() }}
		
		<div class="col-md-4">
			<div class="form-group">			
				<button type="submit" class="btn {{ $isHasTable ? 'btn-danger':'btn-primary' }} btn-lg">
					{{ $isHasTable ? 'Удаление ':'Создание ' }} таблиц
				</button>
			</div>
		</div>
		
		<div class="col-md-8">
				@if($errors->has('message'))
					<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{ $errors->first('message') }}
					</div>			
				@endif
		</div>
	</form>
</div> {{-- end создать справочник --}}

<div class="row">
	<form class="form-inline" role="form" method="POST" action="{{ route('append') }}" enctype="multipart/form-data">
		{{ csrf_field() }}

		<div class="form-group">					
			<div class="col-md-4">
				<button type="submit" class="btn btn-primary btn-lg">
					Заполнить
				</button>
			</div>
		</div>
		
		<div class="form-group">			
			<div class="col-md-4">
				<input type="file" name="filedbf"/>
			</div>
		</div>
		
		<div class="form-group">	
			<div class="col-md-4">
				@if($errors->has('append'))
					<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{ $errors->first('append') }}
					</div>			
				@endif
			</div>			
		</div>

	</form>
</div>
@endsection