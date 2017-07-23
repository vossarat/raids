{{-- Форма для фильтрации данных --}}
<form class="form-inline" role="form" method="GET" action="">
	
	<select class="form-control" name="code">
		<option value="">Код</option>
		@foreach($referenceCode as $item)
			@if(isset($filterCode))
				@if($filterCode == $item->id)
					<option selected value="{{ $item->id }}">{{ $item->code }}</option>
				@else
					<option value="{{ $item->id }}">{{ $item->code }}</option>
				@endif
			@else
					<option value="{{ $item->id }}">{{ $item->code }}</option>
			@endif
		@endforeach
	</select>

	<select class="form-control" name="diagnose">
		<option value="">Диагноз</option>
		@foreach($referenceDiagnose as $item)
			@if(isset($filterDiagnose))
				@if($filterDiagnose == $item->id)
					<option selected value="{{ $item->id }}">{{ $item->name }}</option>
				@else
					<option value="{{ $item->id }}">{{ $item->name }}</option>
				@endif
			@else
					<option value="{{ $item->id }}">{{ $item->name }}</option>
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