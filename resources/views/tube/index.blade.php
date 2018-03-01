@extends('layouts.template')

@section('content')
<h1 class="page-header">__________________</h1>

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

<table id="indexTable" class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>ИНН</th>
			<th>Фамилия И.О.</th>
			<th>Пол</th>
			<th>Дата рождения</th>
			<th colspan="2">Действие</th>
		</tr>
	</thead>
	<tbody>
		@foreach($viewdata as $tube)
		<tr>
			<td>{{ $tube->number }}</td>
			<td>{{ $tube->iinumber }}</td>
			<td>{{ $tube->surname }}</td>
			<td>{{ $tube->sex[0]->name }}</td>
			<td> 01-01-{{ $tube->birthday }}</td>
			<td>     
                <form action="{{ route('edittube', $tube->id) }}">
                	<button type="submit"><i class="fa fa-edit"></i></button>
                </form>
            </td>
			<td>
				<form action="{{ route('destroytube', $tube->id) }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field() }}
                    <button type="submit"><i class="fa fa-trash"></i></button>
                </form>
           </td>
           
            
		</tr>
		@endforeach

	</tbody>
</table>

@push('scripts')
<script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('js/maskinputdate.js') }}"></script>
@endpush

@endsection