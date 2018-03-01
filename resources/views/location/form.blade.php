<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	<label for="name" class="col-md-4 control-label">Наименование МО</label>

	<div class="col-md-6">
		<input id="name" type="text" class="form-control" name="name" value="{{ $viewdata->name or old('name') }}" required>

		@if ($errors->has('name'))
		<span class="help-block">
			<strong>
				{{ $errors->first('name') }}
			</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group">
	<div class="{{ $errors->has('parent_id') ? ' has-error' : '' }}"> {{-- region/lpu field --}}
		
		<label for="parent_id" class="col-md-4 control-label">Подчиненность</label>		
		
		<div class="col-md-6">
		<select class="form-control" name="parent_id">		
			@foreach($referenceRegion as $item)
				@if(isset($viewdata))
					<option {{ $viewdata->parent_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
				@else
					<option value="{{ $item->id }}">{{ $item->name }}</option>
				@endif
			@endforeach			
		</select>

		@if ($errors->has('parent_id'))
		<span class="help-block">
			<strong>
				{{ $errors->first('parent_id') }}
			</strong>
		</span>
		@endif
		</div>
	</div>{{-- end region/lpu field --}}
</div>

<!--<div class="form-group">
	<div class="{{ $errors->has('city_id') ? ' has-error' : '' }}"> {{-- city field --}}
		
		<label for="city_id" class="col-md-4 control-label">Местонахождение</label>		
		
		<div class="col-md-6">
		<select class="form-control" name="city_id">		
			@foreach($referenceCity as $item)
				@if(isset($viewdata))
					<option {{ $viewdata->city_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
				@else
					<option value="{{ $item->id }}">{{ $item->name }}</option>
				@endif
			@endforeach			
		</select>

		@if ($errors->has('city_id'))
		<span class="help-block">
			<strong>
				{{ $errors->first('city_id') }}
			</strong>
		</span>
		@endif
		</div>
	</div>{{-- end city field --}}
</div> -->

<div class="form-group">
	<div class="{{ $errors->has('weight') ? ' has-error' : '' }}"> {{-- weight field --}}
		
		<label for="weight" class="col-md-4 control-label">Порядок</label>

		<div class="col-md-2">
			<input id="weight" type="text" class="form-control" name="weight" value="{{ $viewdata->weight or old('weight') }}">
			@if ($errors->has('weight'))
			<span class="help-block">
				<strong>
					{{ $errors->first('weight') }}
				</strong>
			</span>
			@endif
		</div>
	</div> {{-- end weight field --}}
</div>			