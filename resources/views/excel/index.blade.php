<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="{{ asset('css/table.css') }}"/>

<table>
	<thead>
		<tr>
			<th>#</th>
			<th>Фамилия И.О.</th>
			<th>Пол</th>
			<th>Дата рождения</th>
			<th>Местонахождение</th>
			<th>Дата</th>
			<th>Регион</th>
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
		</tr>
		@endforeach

	</tbody>
</table>


</html>


