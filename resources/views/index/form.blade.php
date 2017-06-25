<div class="form-group{{ $errors->has('NOMER') ? ' has-error' : '' }}"> {{-- NOMER field --}}
	<label for="NOMER" class="col-md-1 control-label">Номер</label>

	<div class="col-md-3">
		<input id="NOMER" type="text" class="form-control" name="NOMER" value="{{$viewdata->NOMER or old('NOMER') }}">
		@if ($errors->has('NOMER'))
		<span class="help-block">
			<strong>
				{{ $errors->first('NOMER') }}
			</strong>
		</span>
		@endif
	</div>
</div> {{-- end NOMER field --}}

<div class="form-group{{ $errors->has('NAME') ? ' has-error' : '' }}"> {{-- NAME field --}}
	<label for="NAME" class="col-md-1 control-label">Пациент</label>

	<div class="col-md-5">
		<input id="NAME" type="text" class="form-control" name="NAME" value="{{ $viewdata->NAME or old('NAME') }}">
		@if ($errors->has('NAME'))
		<span class="help-block">
			<strong>
				{{ $errors->first('NAME') }}
			</strong>
		</span>
		@endif
	</div>
</div> {{-- end NAME field --}}