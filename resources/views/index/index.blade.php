@extends('layouts.template')

@section('content')
<h1 class="page-header">Регистр</h1>

<form action="{{ route('index.create') }}">
	<div class="form-group">
		<button type="submit" class="btn btn-primary">
			<i class="fa fa-plus"></i> Добавить карту</button>
	</div>
</form>

@if(Session::has('message'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	{{Session::get('message')}}
</div>
@endif

@include('index.filter') {{-- подключение формы для фильтрации данных --}}

<table id="indexTable" class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Фамилия ИО</th>
			<th>Пол</th>
			<th>Дата рождения</th>
			<th>Местонахождение</th>
			<th>Дата</th>
			<th>Регион</th>
			<th colspan="2">Действие</th>
		</tr>
	</thead>
	<tbody>
		@foreach($viewdata as $patient)
		<tr>
			<td>{{ $patient->number }}</td>
			<td>{{ $patient->FIO }}</td>
			<td>{{ $patient->sex[0]->name }}</td>
			<td>{{ date('d-m-Y',strtotime($patient->birthday)) }}</td>
			<td>{{ $patient->city[0]->name }}</td>
			<td>{{ $patient->grantdate->format('d-m-Y') }}</td>
			<td>{{ $patient->region[0]->name }}</td>
			<td>     
                <form action="{{ route('index.edit', $patient->id) }}">
                	<button type="submit" class="btn-action"><i class="fa fa-edit"></i></button>
                </form>
            </td>
			<td>
				<form action="{{ route('index.destroy', $patient->id) }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field() }}
                    <button type="submit" class="btn-action"><i class="fa fa-trash"></i></button>
                </form>
           </td>
           
            
		</tr>
		@endforeach

	</tbody>
</table>

{{ $viewdata->appends([
						'sex' => isset($filterSex) ? $filterSex :'',
						'city' => isset($filterCity) ? $filterCity:'',
						'region' => isset($filterRegion) ? $filterRegion:'',
						'filter' => 'filter',
						])->links() }}

@endsection