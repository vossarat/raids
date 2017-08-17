@extends($layout)

@section('content')

<div class="panel-heading"> {{-- заголовок окна --}}
	<a href="{{ url()->previous() }}" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
	<table>
		<tr>
			<td colspan="6" class="noborder center">Отчет по 4-ой фоpме</td>
		</tr>
		<tr>
			<td colspan="6" class="noborder">Отчетный период: {{ $startdate.' - '.$enddate }}</td>
		</tr>
		<tr>
			<td colspan="6" class="noborder">Группа: {{ $city }}</td>
		</tr>
		<tr>
			<td colspan="6" class="noborder">Наименование региона (ЛПУ): {{ $region }}</td>
		</tr>
	</table>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Код</th>
			<th>Контингент обследуемых</th>
			<th>Мужчин</th>
			<th>Женщин</th>
			<th>Не указан</th>
			<th>Всего</th>
		</tr>
	</thead>
	<tbody>
		@foreach($referenceCode as $refcode)
			@foreach($viewdata as $data)				
				@if($refcode->id == $data->id)
				<tr>
					<td>{{ $refcode->code.'-' }}</td>
					<td>{{ $refcode->name }}</td>		
					<td>{{ $data->mens }}</td>
					<td>{{ $data->womens }}</td>
					<td>{{ $data->notspecified }}</td>
					<td>{{ $data->total }}</td>
				</tr>	
				@endif				
			@endforeach			
		@endforeach
	</tbody>
</table>
@endsection

