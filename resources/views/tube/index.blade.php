@extends('layouts.template')

@section('content')
<h1 class="page-header">Загрузка плашек</h1>

@if(Session::has('message'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	{{Session::get('message')}}
</div>
@endif

<div class="form-group">
	<div class="row">
		<form class="form-inline" role="form" method="POST" action="{{ route('addtube') }}" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="form-group">					
				<div class="col-md-4">
					<button type="submit" class="btn btn-primary btn-lg">
						Принять
					</button>
				</div>
			</div>
			
			<div class="form-group">			
				<div class="col-md-4">
					<input type="file" name="filexls"/>
				</div>
			</div>
		</form>
	</div>
</div>

@push('scripts')
<script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('js/maskinputdate.js') }}"></script>
@endpush

@endsection