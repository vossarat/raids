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


<table id="indexTable" class="table table-striped">
	<thead>
		<tr>
			<th>Наименование МО</th>
			<th>Подчиненность</th>
			<th>Местонахождение</th>
			<th>Порядок</th>
			<th colspan="2">Действие</th>
		</tr>
	</thead>
	<tbody>
		@foreach($viewdata as $region)
		<tr>
			<td>{{ $region->name }}</td>
			<td>{{ $region->parent->name }}</td>
			<td>{{ $region->city->name }}</td>
			<td>{{ $region->weight }}</td>
			<td>     
                <form action="{{ route('region.edit', $region->id) }}">
                	<button type="submit" class="btn-action"><i class="fa fa-edit"></i></button>
                </form>
            </td>
			<td>
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

@endsection