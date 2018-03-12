$(document).ready(function()
	{		
		$('#cutaway').on('change', function(){
		
				if( $(this).val() == 2 ){
					$("#lpu").addClass("hide");
					$("#lpu_id").val( 0 );					
					$("#residences").removeClass("hide");
				} else {
					$("#lpu").removeClass("hide");
					$("#residences").addClass("hide");
					$("#residences_id").val( 0 );
				}
				
			});
			
	});