<div class="form-group"> {{-- code field --}}
	<div class="{{ $errors->has('code') ? ' has-error' : '' }}"> 
		
		<label for="code" class="col-md-4 control-label">Код</label>

		<div class="col-md-2">
			<input id="code" type="text" class="form-control" name="code" value="{{ $viewdata->code or old('code') }}">
			@if ($errors->has('code'))
			<span class="help-block">
				<strong>
					{{ $errors->first('code') }}
				</strong>
			</span>
			@endif
		</div>
	</div> 
</div>	{{-- end code field --}}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> {{-- name field --}}
	<label for="name" class="col-md-4 control-label">Наименование</label>

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
</div> {{-- end name field --}}

<div class="form-group"> {{-- parent field --}}
	<div class="{{ $errors->has('parent_id') ? ' has-error' : '' }}"> 
		
		<label for="parent_id" class="col-md-4 control-label">Основной код</label>		
		
		<div class="col-md-6">
		<select class="form-control" name="parent_id">		
			@foreach($referenceCode as $item)
				@if(isset($viewdata))
					<option {{ $viewdata->parent_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->code }}</option>
				@else
					<option value="{{ $item->id }}">{{ $item->code }}</option>
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
	</div>
</div>{{-- end parent field --}}


<div class="form-group"> {{-- weight field --}}
	<div class="{{ $errors->has('weight') ? ' has-error' : '' }}"> 
		
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
	</div> 
</div>	{{-- end weight field --}}