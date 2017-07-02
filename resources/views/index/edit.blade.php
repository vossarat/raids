@extends('layouts.template')

@section('content')

<h1 class="page-header">Картотека</h1>
<div class="panel panel-default">
	<div class="panel-heading"> {{-- заголовок окна --}}
		Редактирование информации по пациенту
		<a href="{{ route('index.index') }}" class="close" data-dismiss="alert" aria-hidden="true">&times;</a> {{-- х закрыть --}}
	</div>

	<div class="panel-body">
		<form class="form-horizontal" role="form" method="POST" action="{{ route('index.update', $viewdata->id) }}">                       
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="put"/>

			@include('index.form')

			<div class="form-group">
				<div class="col-md-3 col-md-offset-1">
					<button type="submit" class="btn btn-primary">
						Редактировать
					</button>
				</div>
			</div>

		</form>
	</div>
</div>

@endsection