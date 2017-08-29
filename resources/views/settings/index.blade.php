@extends('layouts.template')

@section('content')
<h1 class="page-header">Настройки программы</h1>

@if(Session::has('message'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	{{Session::get('message')}}
</div>
@endif

<div class="row"> {{-- Установка периода --}}
	<form class="form-inline" role="form" method="POST" action="{{ route('period') }}">
		{{ csrf_field() }}
		
		{{-- startdate field --}}
		<div class="form-group">
			
			<label for="startdate" class="control-label">Отчетный период c</label>
			<input id="startdate" type="text" class="form-control" name="startdate" value="{{ $viewdata['startdate'] or old('startdate') }}">
		</div>
		{{-- end startdate field --}}
		
		{{-- enddate field --}}
		<div class="form-group">
			
			<label for="enddate" class="control-label">по</label>
			<input id="enddate" type="text" class="form-control" name="enddate" value="{{ $viewdata['enddate'] or old('enddate') }}">
		</div>
		{{-- end enddate field --}}

		{{-- button save period --}}
		<div class="form-group">
			<button type="submit" class="btn btn-info">
				Установить период
			</button>
		</div>
		{{-- end button save period --}}
	</form>
</div> {{-- Конец блока установка периода --}}

@push('scripts')
<script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('js/maskinputdate.js') }}"></script>
@endpush

@endsection