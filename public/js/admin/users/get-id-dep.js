// JavaScript Documen
(function($){
	"use strict";
	
	$('#getiddep').change(function(e){
		e.preventDefault();
		
		$('#loader').slideDown(300);
		var action = $(this).attr('href');
		 $.ajaxSetup({
			  headers: {
				  'X-CSRF-TOKEN': $('input[name="_token"]').val()
			  }
          });
		  
		$('#team').empty(); // empty select
		
		let id = $("#department option:selected").val();
		//let depname = $("#department option:selected").text();
		
		var dataString = "iddep="+id;

		$.ajax({
			type : 'POST',
			url:action,
			data: dataString,
			timeout: 30000,
			success: function(data){
				if(typeof data !== 'undefined'){
					var responceData = jQuery.parseJSON(data);
					if(responceData.status === 'success'){
						$('#loader').slideUp(300);
						//toastr.success(responceData.message,responceData.status);
						console.log(responceData.data);
						
						$('#input_team').removeAttr('style');
						
						if(responceData.rolelevel != 3)
						{
							$('#team').append('<option value="" selected>Select Team</option>');
							$.each(responceData.data, function(index, value) {
								$('#team').append('<option value="'+ index +'">'+ value +'</option>');
							});
						}
						else
						{
							//$('#team').attr('style', 'readonly:readonly');
							$('#team').append('<option value="0" readonly="readonly">ALL TEAMS</option>');
						}
						
					}else{
						$('#loader').slideUp(300);
						toastr.error(responceData.message,responceData.status);
					}


				}else{
					console.log(typeof data);
					$('#loader').slideUp(300);
					toastr.error('Bad responce!');
				}
			},
			error: function(){
				$('#loader').slideUp(300);
				console.error('Query Error Execution Timeout!');
				toastr.error('Query Error Execution Timeout!');
			},
		});
		
	});
	
	
	
})(jQuery);