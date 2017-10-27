@extends($layout)

@section('content')

<div class="panel-heading"> {{-- заголовок окна --}}
	<a href="{{ url()->previous() }}" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
	<table>
		<tr>
			<td colspan="6" class="noborder center">Отчет по 4-ой фоpме в сравнении с прошлым периодом</td>
		</tr>
		<tr>
			<td colspan="6" class="noborder">Отчетный период: {{ $startdate.' - '.$enddate }}</td>
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
			<th>Всего за соответвующий период прошлого года</th>
			<th>Всего за отчетный период</th>
		</tr>
	</thead>
	<tbody>
		@foreach($referenceCode as $refcode)			
			@foreach($viewdata as $data)				
				@if($refcode->id == $data->id)
				<tr>
					<td>{{ $refcode->code.' ' }}</td>
					<td class="cell-namecode">{{ $refcode->name }}</td>
					<td>{{ $data->lastcount }}</td>
					<td>{{ $data->currentcount }}</td>
				@endif						
				</tr> 
			@endforeach
		@endforeach
	</tbody>
</table>
@endsection

