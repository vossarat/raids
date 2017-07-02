<div class="form-group">{{-- number field --}}
	<div class="{{ $errors->has('number') ? ' has-error' : '' }}">		
		
		<label for="number" class="col-md-2 control-label">Регистрационный номер</label>
		
		<div class="col-md-3">
			<input id="number" type="text" class="form-control" name="number" value="{{$viewdata->number or old('number') }}">
			@if ($errors->has('number'))
			<span class="help-block">
				<strong>
					{{ $errors->first('number') }}
				</strong>
			</span>
			@endif
		</div>
		
	</div>
</div> {{-- end number field --}}

<div class="form-group">
<div class="{{ $errors->has('FIO') ? ' has-error' : '' }}"> {{-- FIO field --}}
	
	<label for="FIO" class="col-md-2 control-label">Пациент</label>

	<div class="col-md-4">
		<input id="FIO" type="text" class="form-control" name="FIO" value="{{ $viewdata->FIO or old('FIO') }}">
		@if ($errors->has('FIO'))
		<span class="help-block">
			<strong>
				{{ $errors->first('FIO') }}
			</strong>
		</span>
		@endif
	</div>
	
	</div> {{-- end FIO field --}}
</div> 	

<div class="form-group">
	<div class="{{ $errors->has('birthday') ? ' has-error' : '' }}"> {{-- birthday field --}}
		
		<label for="birthday" class="col-md-2 control-label">Дата рождения</label>
		
		<div class="col-md-2">
		<input id="birthday" type="text" class="form-control" name="birthday" value="{{ isset($viewdata->birthday) ? date('d-m-Y', strtotime($viewdata->birthday)):'' }}">
			@if ($errors->has('birthday'))
			<span class="help-block">
				<strong>
					{{ $errors->first('birthday') }}
				</strong>
			</span>
			@endif
		</div>
	</div>{{-- end birthday field --}}
</div>

<div class="form-group">
	<div class="{{ $errors->has('code') ? ' has-error' : '' }}"> {{-- code field --}}
		
		<label for="code" class="col-md-2 control-label">Код</label>

		<div class="col-md-1">
			<input id="code" type="text" class="form-control" name="code" value="{{ $viewdata->code or old('code') }}">
			@if ($errors->has('code'))
			<span class="help-block">
				<strong>
					{{ $errors->first('code') }}
				</strong>
			</span>
			@endif
		</div>
	</div> {{-- end code field --}}
</div>	

<div class="form-group">
	<div class="{{ $errors->has('sex_id') ? ' has-error' : '' }}"> {{-- sex field --}}
		
		<label for="sex_id" class="col-md-2 control-label">Пол</label>		
		
		<div class="col-md-3">
		<select class="form-control" name="sex_id">		
			@foreach($referenceSex as $item)
				@if(isset($viewdata))
					<option {{ $viewdata->sex_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
				@else
					<option value="{{ $item->id }}">{{ $item->name }}</option>
				@endif
			@endforeach			
		</select>

		@if ($errors->has('sex_id'))
		<span class="help-block">
			<strong>
				{{ $errors->first('sex_id') }}
			</strong>
		</span>
		@endif
		</div>
	</div>{{-- end sex field --}}
</div>	

<div class="form-group">	
	<div class="{{ $errors->has('grantdate') ? ' has-error' : '' }}"> {{-- grantdate field --}}
		
		<label for="grantdate" class="col-md-2 control-label">Дата обследования</label>		
		
		<div class="col-md-2">
		<input id="grantdate" type="text" class="form-control" name="grantdate1" value="{{ isset($viewdata->birthday) ? date('d-m-Y', strtotime($viewdata->grantdate)) : date('d-m-Y') }}">
			@if ($errors->has('grantdate'))
			<span class="help-block">
				<strong>
					{{ $errors->first('grantdate') }}
				</strong>
			</span>
			@endif
		</div>
	</div>{{-- end grantdate field --}}	
</div>
	
<div class="form-group">
	<div class="{{ $errors->has('city_id') ? ' has-error' : '' }}"> {{-- city field --}}
		
		<label for="city_id" class="col-md-2 control-label">Место жительства</label>		
		
		<div class="col-md-3">
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
</div>

<div class="form-group">
	<div class="{{ $errors->has('region_id') ? ' has-error' : '' }}"> {{-- region/lpu field --}}
		
		<label for="region_id" class="col-md-2 control-label">ЛПУ</label>		
		
		<div class="col-md-3">
		<select class="form-control" name="region_id">		
			@foreach($referenceRegion as $item)
				@if(isset($viewdata))
					<option {{ $viewdata->region_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
				@else
					<option value="{{ $item->id }}">{{ $item->name }}</option>
				@endif
			@endforeach			
		</select>

		@if ($errors->has('region_id'))
		<span class="help-block">
			<strong>
				{{ $errors->first('region_id') }}
			</strong>
		</span>
		@endif
		</div>
	</div>{{-- end region/lpu field --}}
</div>	

<div class="form-group">
	<div class="{{ $errors->has('diagnose_id') ? ' has-error' : '' }}"> {{-- diagnose field --}}
		
		<label for="diagnose_id" class="col-md-2 control-label">Диагноз</label>		
		
		<div class="col-md-3">
		<select class="form-control" name="diagnose_id">		
			@foreach($referenceDiagnose as $item)
				@if(isset($viewdata))
					<option {{ $viewdata->diagnose_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
				@else
					<option value="{{ $item->id }}">{{ $item->name }}</option>
				@endif
			@endforeach			
		</select>

		@if ($errors->has('diagnose_id'))
		<span class="help-block">
			<strong>
				{{ $errors->first('diagnose_id') }}
			</strong>
		</span>
		@endif
		</div>
	</div>{{-- end diagnose field --}}
</div>

<div class="form-group">
	<div class="{{ $errors->has('family_id') ? ' has-error' : '' }}"> {{-- family field --}}
		
		<label for="family_id" class="col-md-2 control-label">Семейное положение</label>		
		
		<div class="col-md-3">
		<select class="form-control" name="family_id">		
			@foreach($referenceFamily as $item)
				@if(isset($viewdata))
					<option {{ $viewdata->family_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
				@else
					<option value="{{ $item->id }}">{{ $item->name }}</option>
				@endif
			@endforeach			
		</select>

		@if ($errors->has('family_id'))
		<span class="help-block">
			<strong>
				{{ $errors->first('family_id') }}
			</strong>
		</span>
		@endif
		</div>
	</div>{{-- end family field --}}
</div>

<div class="form-group">
	<div class="{{ $errors->has('national_id') ? ' has-error' : '' }}"> {{-- national field --}}
		
		<label for="national_id" class="col-md-2 control-label">Национальность</label>		
		
		<div class="col-md-3">
		<select class="form-control" name="national_id">		
			@foreach($referenceNational as $item)
				@if(isset($viewdata))
					<option {{ $viewdata->national_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
				@else
					<option value="{{ $item->id }}">{{ $item->name }}</option>
				@endif
			@endforeach			
		</select>

		@if ($errors->has('national_id'))
		<span class="help-block">
			<strong>
				{{ $errors->first('national_id') }}
			</strong>
		</span>
		@endif
		</div>
	</div>{{-- end national field --}}
</div>		

<div class="form-group">
	<div class="{{ $errors->has('social_id') ? ' has-error' : '' }}"> {{-- social field --}}
		
		<label for="social_id" class="col-md-2 control-label">Социальное положение</label>		
		
		<div class="col-md-3">
		<select class="form-control" name="social_id">		
			@foreach($referenceSocial as $item)
				@if(isset($viewdata))
					<option {{ $viewdata->social_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
				@else
					<option value="{{ $item->id }}">{{ $item->name }}</option>
				@endif
			@endforeach			
		</select>

		@if ($errors->has('social_id'))
		<span class="help-block">
			<strong>
				{{ $errors->first('social_id') }}
			</strong>
		</span>
		@endif
		</div>
	</div>{{-- end social field --}}
</div>

<div class="form-group">
	<div class="{{ $errors->has('ifa_id') ? ' has-error' : '' }}"> {{-- ifa field --}}
		
		<label for="ifa_id" class="col-md-2 control-label">ИФА</label>		
		
		<div class="col-md-3">
		<select class="form-control" name="ifa_id">		
			@foreach($referenceIfa as $item)
				@if(isset($viewdata))
					<option {{ $viewdata->ifa_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
				@else
					<option value="{{ $item->id }}">{{ $item->name }}</option>
				@endif
			@endforeach			
		</select>

		@if ($errors->has('ifa_id'))
		<span class="help-block">
			<strong>
				{{ $errors->first('ifa_id') }}
			</strong>
		</span>
		@endif
		</div>
	</div>{{-- end ifa field --}}
</div>			