$(document).ready(function()
	{		
		var selectRegion = $('#region_id'),
		cache = $('option', selectRegion);
		$('#city_id').on('change', function(){
				var selectedCity = $(':selected',this).data('city'),
				filtered;
				if(selectedCity == '0') {
					filtered = cache;
				} else {
					filtered = cache.filter(function(){
							return $(this).data('city') == selectedCity;
						});
				}
				$('#region_id').html(filtered).prop('selectedIndex', 0);
			});
		
	});