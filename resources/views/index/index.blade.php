@extends('layouts.template')

@section('content')
<h1 class="page-header">Регистр</h1>

<div class="form-group">
	<form action="{{ route('index.create') }}">

			<button type="submit" class="btn btn-primary">
				<i class="fa fa-plus"></i> Добавить карту
			</button>

	</form>
</div>

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
			<th>Фамилия И.О.</th>
			<th>Пол</th>
			<th>Дата рождения</th>
			<th>Код</th>
			<th>Дата</th>
			<!--<th>Регион</th>-->
			<th colspan="2">Действие</th>
		</tr>
	</thead>
	<tbody>
		@foreach($viewdata as $patient)
		<tr>
			<td>{{ $patient->number }}</td>
			<td>{{ $patient->surname.' '.mb_substr($patient->name,0,1,"UTF-8").mb_substr($patient->middlename,0,1,"UTF-8") }}</td>
			<td>{{ $patient->sex[0]->name }}</td>
			<td>{{ date('d-m-Y',strtotime($patient->birthday)) }}</td>
			<td>{{ $patient->code[0]->code }}</td>
			<td>{{ $patient->grantdate->format('d-m-Y') }}</td>
			<!--<td>{{-- $patient->region[0]->name --}}</td>-->
			<td>     
                <form action="{{ route('index.edit', $patient->id) }}">
                	<button type="submit" {{ $patient->duplicate ||  $patient->mainduplicate ? 'disabled': '' }} class="btn-action"><i class="fa fa-edit"></i></button>
                </form>
            </td>
			<td>
				<form action="{{ route('index.destroy', $patient->id) }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field() }}
                    <button type="submit" {{ $patient->duplicate ||  $patient->mainduplicate ? 'disabled': '' }} class="btn-action"><i class="fa fa-trash"></i></button>
                </form>
           </td>
           
            
		</tr>
		@endforeach

	</tbody>
</table>

{{ $viewdata->appends([
						'number' => isset($filterNumber) ? $filterNumber :'',
						'surname' => isset($filterSurname) ? $filterSurname :'',
						'code' => isset($filterCode) ? $filterCode :'',
						'diagnose' => isset($filterDiagnose) ? $filterDiagnose:'',
						'region' => isset($filterRegion) ? $filterRegion:'',
						'filter' => 'filter',
						])->links() }}

@endsection