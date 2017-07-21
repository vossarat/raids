@extends('layouts.template')

@section('content')
<h1 class="page-header">Справочник ЛПУ</h1>

<div class="form-group">
	<form action="{{ route('region.create') }}">

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


<table id="indexTable" class="table table-condensed table-striped table-scroll">
	<thead>
		<tr>
			<th class="col-sm-3">Наименование МО</th>
			<th class="col-sm-3">Подчиненность</th>
			<th class="col-sm-2">Местонахождение</th>
			<th class="col-sm-2">Порядок</th>
			<th class="col-sm-2" colspan="2">Действие</th>
		</tr>
	</thead>
	<tbody>
		@foreach($viewdata as $region)
		<tr>
			<td class="col-sm-3">{{ $region->name }}</td>
			<td class="col-sm-3">{{ $region->parent->name }}</td>
			<td class="col-sm-2">{{ $region->city->name }}</td>
			<td class="col-sm-2">{{ $region->weight }}</td>
			<td class="col-sm-1">     
                <form action="{{ route('region.edit', $region->id) }}">
                	<button type="submit" class="btn-action"><i class="fa fa-edit"></i></button>
                </form>
            </td>
			<td class="col-sm-1">
				<form action="{{ route('region.destroy', $region->id) }}" method="POST">
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