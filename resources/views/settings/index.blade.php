@extends('layouts.template')

@section('content')
<h1 class="page-header">Настройки программы</h1>

@if(Session::has('message'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	{{Session::get('message')}}
</div>
@endif

<div class="form-group">
	@include('settings.period')
</div> 

<div class="form-group">
	@include('settings.closedate')
</div>




@push('scripts')
<script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('js/maskinputdate.js') }}"></script>
@endpush

@endsection