@extends('layouts.template')

@section('content')
<h1 class="page-header">Коды</h1>

<div class="form-group">
	<form action="{{ route('code.create') }}">

			<button type="submit" class="btn btn-primary">
				<i class="fa fa-plus"></i> Добавить
			</button>

	</form>
</div>

@if(Session::has('message'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	{{Session::get('message')}}
</div>
@endif


<table class="table table-condensed table-striped table-scroll">
	<thead>
		<tr>
			<th class="col-sm-3 text-center">Код</th>
			<th class="col-sm-3 text-center">Наименование</th>
			<th class="col-sm-3 text-center">Основной код</th>
			<th class="col-sm-1 text-center">Порядок</th>
			<th class="col-sm-2" colspan="2">Действие</th>
		</tr>
	</thead>
	<tbody>
		@foreach($viewdata as $code)
		<tr>
			<td class="col-sm-3 text-center">{{ $code->code }}</td>
			<td class="col-sm-3 text-center">{{ $code->name }}</td>
			<td class="col-sm-3 text-center">{{ $code->parent->name }}</td>
			<td class="col-sm-1 text-center">{{ $code->weight }}</td>
			<td class="col-sm-1">     
                <form action="{{ route('code.edit', $code->id) }}">
                	<button type="submit" class="btn-action"><i class="fa fa-edit"></i></button>
                </form>
            </td>
			<td class="col-sm-1">
				<form action="{{ route('code.destroy', $code->id) }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field() }}
                    <button type="submit" class="btn-action"><i class="fa fa-trash"></i></button>
                </form>
           </td>
           
            
		</tr>
		@endforeach

	</tbody>
</table>

@push('css')
	<link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endpush

@endsection