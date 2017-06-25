@extends('layouts.template')

@section('content')

<h1 class="page-header">Окно формы</h1>
	<div class="panel panel-default">
		<div class="panel-heading"> {{-- заголовок окна --}}
			Заголовок окна
			<a href="{{ route('index') }}" class="close" data-dismiss="alert" aria-hidden="true">&times;</a> {{-- х закрыть --}}
		</div>

		<div class="panel-body">
			<form class="form-horizontal" role="form" method="POST" action="{{ route('store') }}">
				{{ csrf_field() }}

				@include('index.form')

				<div class="form-group">
					<div class="col-md-3 col-md-offset-1">
						<button type="submit" class="btn btn-primary">
							Кнопка
						</button>
					</div>
				</div>

			</form>
		</div>
	</div>

@endsection