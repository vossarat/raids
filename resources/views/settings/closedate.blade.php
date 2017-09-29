<div class="row"> {{-- Закрытие периода --}}
	<form class="form-inline" role="form" method="POST" action="{{ route('closedate') }}">
		{{ csrf_field() }}
		
		{{-- closedate field --}}
		<div class="form-group">
			
			<label for="closedate" class="control-label">Закрыть период</label>
			<input id="closedate" type="text" class="form-control" name="closedate" value="{{ $viewdata['closedate'] or old('closedate') }}" {{ Auth::user()->id == 3 ? '' : 'disabled' }}>
		</div>
		{{-- end closedate field --}}
		
		{{-- button save close period --}}
		<div class="form-group">
			<button type="submit" class="btn btn-info" {{ Auth::user()->id == 3 ? '' : 'disabled' }}>
				Закрыть период
			</button>
		</div>
		{{-- end button save close period --}}
	</form>
</div> {{-- Конец блока Закрытие периода --}}