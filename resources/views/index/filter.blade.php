{{-- Форма для фильтрации данных --}}
<form class="form-inline" role="form" method="GET" action="">
	<div class="form-group">
		<select class="form-control" name="sex">
			<option value="">Пол</option>
			@foreach($referenceSex as $itemSex)
			@if(isset($sex))
			@if($sex == $itemSex->id)
			<option selected value="{{ $itemSex->id }}">{{ $itemSex->name }}</option>
			@else
			<option value="{{ $itemSex->id }}">{{ $itemSex->name }}</option>
			@endif
			@else
			<option value="{{ $itemSex->id }}">{{ $itemSex->name }}</option>
			@endif
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<select class="form-control" name="city">
			<option value="">Область/Город</option>
			@foreach($referenceCity as $itemCity)
			@if(isset($city))
			@if($city == $itemCity->id)
			<option selected value="{{ $itemCity->id }}">{{ $itemCity->name }}</option>
			@else
			<option value="{{ $itemCity->id }}">{{ $itemCity->name }}</option>
			@endif
			@else
			<option value="{{ $itemCity->id }}">{{ $itemCity->name }}</option>
			@endif
			@endforeach
		</select>
	</div>

	<button type="submit" class="btn btn-primary" name="filter" value="filter"><i class="fa fa-filter"></i>Фильтр</button>
	<button type="submit" class="btn btn-warning" name="reset" value="reset"><i class="fa fa-close"></i></button>
</form>