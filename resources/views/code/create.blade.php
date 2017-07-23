@extends('layouts.template')

@section('content')

	<h1 class="page-header">Код</h1>

	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading"> {{-- заголовок окна --}}
				Добавить код
				<a href="{{ route('code.index') }}" class="close" data-dismiss="alert" aria-hidden="true">&times;</a> {{-- х закрыть --}}
			</div>

			<div class="panel-body">
				<form class="form-horizontal" role="form" method="POST" action="{{ route('code.store') }}">
					{{ csrf_field() }}

					@include('code.form')

					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button type="submit" class="btn btn-primary">
								Добавить
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>

@endsection