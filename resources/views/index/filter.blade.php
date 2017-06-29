{{-- Форма для фильтрации данных --}}
<form class="form-inline" role="form" method="GET" action="">
	
	{{--  <select class="form-control" name="year">
		<option value="">Пол</option>
		@foreach($referenceYear as $itemYear)
			@if($referenceYear == $itemYear->id)
				<option selected value="{{ $itemYear->id }}">{{ $itemYear->name }}</option>
			@else
				<option value="{{ $itemYear->id }}">{{ $itemYear->name }}</option>
			@endif
		@endforeach
	</select>--}}
	
	<select class="form-control" name="sex">
		<option value="">Пол</option>
		@foreach($referenceSex as $itemSex)
			@if(isset($filterSex))
				@if($filterSex == $itemSex->id)
					<option selected value="{{ $itemSex->id }}">{{ $itemSex->name }}</option>
				@else
					<option value="{{ $itemSex->id }}">{{ $itemSex->name }}</option>
				@endif
			@else
					<option value="{{ $itemSex->id }}">{{ $itemSex->name }}</option>
			@endif
		@endforeach
	</select>

	<select class="form-control" name="city">
		<option value="">Местонахождение</option>
		@foreach($referenceCity as $itemCity)
			@if(isset($filterCity))
				@if($filterCity == $itemCity->id)
					<option selected value="{{ $itemCity->id }}">{{ $itemCity->name }}</option>
				@else
					<option value="{{ $itemCity->id }}">{{ $itemCity->name }}</option>
				@endif
			@else
					<option value="{{ $itemCity->id }}">{{ $itemCity->name }}</option>
			@endif
		@endforeach
	</select>
	
	<select class="form-control" name="region">
		<option value="">Район/ЛПУ</option>
		@foreach($referenceRegion as $itemRegion)
			@if(isset($filterRegion))
				@if($filterRegion == $itemRegion->id)
					<option selected value="{{ $itemRegion->id }}">{{ $itemRegion->name }}</option>
				@else
					<option value="{{ $itemRegion->id }}">{{ $itemRegion->name }}</option>
				@endif
			@else
					<option value="{{ $itemRegion->id }}">{{ $itemRegion->name }}</option>
			@endif
		@endforeach
	</select>

	<button type="submit" class="btn btn-primary" name="filter" value="filter"><i class="fa fa-filter"></i>Фильтр</button>
	<button type="submit" class="btn btn-warning" name="reset" value="reset"><i class="fa fa-close"></i></button>
	
</form>