@extends($layout)

@section('content')

<div class="panel-heading"> {{-- заголовок окна --}}
	<a href="{{ url()->previous() }}" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
	<table>
		<tr>
			<td colspan="8" class="noborder center">{{ $title }}</td>
		</tr>
		<tr>
			<td colspan="8" class="noborder">Отчетный период: {{ $startdate.' - '.$enddate }}</td>
		</tr>
		<tr>
			<td colspan="8" class="noborder">Наименование региона (ЛПУ): {{ $region }}</td>
		</tr>
		
		<tr>
			<td colspan="8" class="noborder">Наименование кода: {{ $code }}</td>
		</tr>
		
		<tr>
			<td colspan="8" class="noborder">Наименование диагноза: {{ $diagnose }}</td>
		</tr>
		
		<tr>
			<td colspan="8" class="noborder">Пол: {{ $sex }}</td>
		</tr>
		
	</table>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Номер</th>
			<th>Фамилия И.О.</th>
			<th>Пол</th>
			{{--<th>Местожительство</th>--}}
			<th>Код</th>
			<th>Диагноз</th>
			{{--<th>ЛПУ</th>--}}
			<th>Дата</th>
		</tr>
	</thead>
	<tbody>
			@foreach($viewdata as $data)				
				<tr>
					<td>{{ $data->number }}</td>
					<td>{{ $data->surname }}</td>
					<td>{{ $data->sex[0]->name }}</td>
					{{--<td>{{ $data->city[0]->name }}</td>--}}
					<td>{{ $data->code[0]->code.' ' }}</td>
					<td>{{ $data->diagnose[0]->name }}</td>
					{{--<td>{{ $data->region[0]->name }}</td>--}}					
					<td>{{ $data->grantdate->format('d-m-Y') }}</td>
				</tr>	
			@endforeach			
	</tbody>
</table>

<table>
	<tr>
		<td colspan="7" class="noborder">Примечание: Отображается не более 8000 записей фильтра</td>
	</tr>
</table>
@endsection

