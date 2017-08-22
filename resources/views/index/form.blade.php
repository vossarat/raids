<div class="form-group">{{-- number field IIN field --}}
	<div class="{{ $errors->has('number') ? ' has-error' : '' }}">		
		
		<label for="number" class="col-md-2 control-label">Регистрационный номер</label>
		
		<div class="col-md-2">
			<input id="number" type="text" class="form-control" name="number" value="{{$newNumber or old('number') }}">
			@if ($errors->has('number'))
			<span class="help-block">
				<strong>
					{{ $errors->first('number') }}
				</strong>
			</span>
			@endif
		</div>
		
	</div>
	
	<div class="{{ $errors->has('IIN') ? ' has-error' : '' }}">		
		
		<label for="IIN" class="col-md-2 control-label">ИИН</label>
		
		<div class="col-md-3">
			<input id="IIN" type="text" class="form-control" name="IIN" value="{{$viewdata->IIN or old('myfield') }}">
			@if ($errors->has('IIN'))
			<span class="help-block">
				<strong>
					{{ $errors->first('IIN') }}
				</strong>
			</span>
			@endif
		</div>
		
	</div>
</div> {{-- end number field IIN field--}}


<div class="form-group">{{-- FIO field --}}
	<div class="{{ $errors->has('surname') ? ' has-error' : '' }}"> 
		
		<label for="surname" class="col-md-2 control-label">Фамилия</label>

		<div class="col-md-2">
			<input id="surname" type="text" class="form-control" name="surname" value="{{ $viewdata->surname or old('surname') }}">
			@if ($errors->has('surname'))
			<span class="help-block">
				<strong>
					{{ $errors->first('surname') }}
				</strong>
			</span>
			@endif
		</div>
		
	</div>
	
	<label for="name" class="col-md-1 control-label">Имя</label>
	<div class="col-md-2">
		<input id="name" type="text" class="form-control" name="name" value="{{ $viewdata->name or old('name') }}">
	</div>
	
	<label for="middlename" class="col-md-1 control-label">Отчество</label>
	<div class="col-md-2">
		<input id="middlename" type="text" class="form-control" name="middlename" value="{{ $viewdata->middlename or old('middlename') }}">
	</div>
	 
</div> 	{{-- end FIO field --}}

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
		<input id="grantdate" type="text" class="form-control" name="grantdate" value="{{ isset($viewdata->grantdate) ? date('d-m-Y', strtotime($viewdata->grantdate)) : date('d-m-Y') }}">
			@if ($errors->has('grantdate'))
			<span class="help-block">
				<strong>
					{{ $errors->first('grantdate') }}
				</strong>
			</span>
			@endif
		</div>
	</div>{{-- end grantdate field --}}	

	<div class="{{ $errors->has('code_id') ? ' has-error' : '' }}"> {{-- code field --}}
		
		<label for="code_id" class="col-md-2 control-label">Код</label>		
		
		<div class="col-md-5">
		<select class="form-control" name="code_id" id="code_id">		
			@foreach($referenceCode as $item)
				@if(isset($viewdata))
					<option {{ $viewdata->code_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->code.'-'.$item->name }}</option>
				@else
					<option value="{{ $item->id }}">{{ $item->code.'-'.$item->name }}</option>
				@endif
			@endforeach			
		</select>

		@if ($errors->has('code_id'))
		<span class="help-block">
			<strong>
				{{ $errors->first('code_id') }}
			</strong>
		</span>
		@endif
		</div>
	</div>{{-- end code field --}}
</div>	

<div class="form-group">
	<div class="{{ $errors->has('city_id') ? ' has-error' : '' }}"> {{-- city field --}}
		
		<label for="city_id" class="col-md-2 control-label">Место жительства</label>		
		
		<div class="col-md-2">
		<select class="form-control" name="city_id" id="city_id">		
			@foreach($referenceCity as $item)
				@if(isset($viewdata))
					<option {{ $viewdata->city_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}" data-city="{{ $item->id }}">{{ $item->name }}</option>
				@else
					<option value="{{ $item->id }}" data-city="{{ $item->id }}">{{ $item->name }}</option>
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
	
	<div class="{{ $errors->has('region_id') ? ' has-error' : '' }}"> {{-- region/lpu field --}}
		
		<label for="region_id" class="col-md-1 control-label">ЛПУ</label>		
		
		<div class="col-md-2">
		<select class="form-control" name="region_id" id="region_id">		
			@foreach($referenceRegion as $item)
				@if(isset($viewdata))
					<option {{ $viewdata->region_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}" data-city="{{ $item->city_id }}">{{ $item->name }}</option>
				@else
					<option value="{{ $item->id }}" data-city="{{ $item->city_id }}">{{ $item->name }}</option>
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
	
	<div class="{{ $errors->has('diagnose_id') ? ' has-error' : '' }}"> {{-- diagnose field --}}
		
		<label for="diagnose_id" class="col-md-1 control-label">Диагноз</label>		
		
		<div class="col-md-3">
		<select class="form-control" name="diagnose_id" id="diagnose_id">		
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
	<div class="col-md-3 col-md-offset-2">
		<div class="checkbox">
			<label>
				@if(isset($viewdata))
				<input type="checkbox" name="imunnoblot" value="1" {{ $viewdata->imunnoblot ? 'checked' : '' }}> Имунноблот
				@else
				<input type="checkbox" name="imunnoblot" value="1" {{ old('imunnoblot') ? 'checked' : '' }}> Имунноблот
				@endif
			</label>
		</div>
	</div>
</div>

<div class="form-group">{{-- User field --}}
		<label for="user_id" class="col-md-2 control-label">Зарегистрировал</label>
		<div class="col-md-3">
			<input type="text" class="form-control" value="{{ $viewdata->user->name or Auth::user()->name }}" readonly>
		</div> {{-- user_id добавляется через RegisterRequest --}}
</div> {{-- end User field --}}

@push('scripts')
<script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('js/maskinputdate.js') }}"></script>
<script src="{{ asset('js/index/filter_city_on_region.js') }}"></script>
@if(Auth::user()->id == 3)
<script src="{{ asset('js/index/filter_code_on_diagnose.js') }}"></script>
@endif

@endpush