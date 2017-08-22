$(document).ready(function()
	{		
		$('#code_id').on('change', function(){ // Место(city_id) == code(code_id)
				var selectCode = $(':selected',this).val();
				switch( selectCode ){
					case '31': $('#diagnose_id').val( '60' ); break;
					case '82': $('#diagnose_id').val( '301' ); break;
					case '83': $('#diagnose_id').val( '300' ); break;
					case '84': $('#diagnose_id').val( '302' ); break;
					case '85': $('#diagnose_id').val( '5' ); break;
					case '39': $('#diagnose_id').val( '15' ); break;
					case '40': $('#diagnose_id').val( '7' ); break;
					case '41': $('#diagnose_id').val( '146' ); break;
					case '59': $('#diagnose_id').val( '10' ); break;
					case '86': $('#diagnose_id').val( '335' ); break;
					case '93': $('#diagnose_id').val( '336' ); break;
					case '104': $('#diagnose_id').val( '9' ); break;
					case '105': $('#diagnose_id').val( '169' ); break;
					case '78': $('#diagnose_id').val( '164' ); break;
					case '79': $('#diagnose_id').val( '280' ); break;
					case '88': $('#diagnose_id').val( '29' ); break;
					case '36': $('#diagnose_id').val( '289' ); break;
					case '37': $('#diagnose_id').val( '290' ); break;
					case '38': $('#diagnose_id').val( '291' ); break;
					case '57': $('#diagnose_id').val( '292' ); break;
					case '97': $('#diagnose_id').val( '337' ); break;
					case '14': $('#diagnose_id').val( '51' ); break;
					case '14': $('#diagnose_id').val( '293' ); break;
					case '90': $('#diagnose_id').val( '262' ); break;
					case '27': $('#diagnose_id').val( '227' ); break;
					case '74': $('#diagnose_id').val( '299' ); break;
					case '17': $('#diagnose_id').val( '144' ); break;
					// ...
					default: $('#diagnose_id').val( '137' );
				}
			});
		
	});