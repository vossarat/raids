@extends($layout)

@section('content')

<div class="panel-heading"> {{-- заголовок окна --}}
	<a href="{{ url()->previous() }}" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
	<table>
		<tr>
			<td colspan="5" class="noborder center">Количество обследованных по региону (ЛПУ)</td>
		</tr>
		<tr>
			<td colspan="5" class="noborder">Отчетный период: {{ $startdate.' - '.$enddate }}</td>
		</tr>
	</table>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Наименованание региона (ЛПУ)</th>
			<th>Мужчин</th>
			<th>Женщин</th>
			<th>Не указан</th>
			<th>Всего</th>
		</tr>
	</thead>
	<tbody>
		@foreach($referenceRegion as $region)			
			@foreach($viewdata as $data)				
				@if($region->id == $data->regionid)
				<tr>
					<td>{{ $region->name }}</td>									
					<td>{{ $data->mens }}</td>
					<td>{{ $data->womens }}</td>
					<td>{{ $data->notspecified }}</td>
					<td>{{ $data->total }}</td>
				@endif						
				</tr> 
			@endforeach
		@endforeach
	</tbody>
</table>
@endsection

