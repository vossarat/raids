$(document).ready(function()
	{
		$('#indexTable').DataTable(
			{
				sPaginationType: "listbox",
				/*searching: false,
				"info":    false,
				"pageLength": 3,
				"bLengthChange": false,
				columnDefs: [{
                             targets: [2,3],
                             orderable: false,
                         	}],*/
			}
			);
	});