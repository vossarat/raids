@extends('layouts.report')

@section('content')

<table>
	<tr>
		<td colspan="6" class="noborder center">Отчет по 4-ой фоpме</td>
	</tr>
	<tr>
		<td colspan="6" class="noborder">Отчетный период: {{ $startdate.' - '.$enddate }}</td>
	</tr>
	<tr>
		<td colspan="6" class="noborder">Наименование региона (ЛПУ): {{ $region }}</td>
	</tr>
</table>

<table>
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
		@foreach($viewdata as $code)
		<tr>
			<td>{{ $code->code.' - ' }}</td>
			<td>{{ $code->codename }}</td>
			<td>{{ $code->mens }}</td>
			<td>{{ $code->womens }}</td>
			<td>{{ $code->notspecified }}</td>
			<td>{{ $code->total }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection

