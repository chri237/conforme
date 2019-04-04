
// JavaScript Documen
(function($){
	"use strict";
	
	$('#getidrole_u').change(function(e){
		e.preventDefault();
		
		$('#loader').slideDown(300);
		var action = $(this).attr('href');
		 $.ajaxSetup({
			  headers: {
				  'X-CSRF-TOKEN': $('input[name="_token"]').val()
			  }
          });
		  
		$('#department_u').empty(); // empty select
		
		let rolelevel =  $("#role_u option:selected").val();
		//let rolename =  $("#role option:selected").text();
		
		var dataString = "rolelevel="+rolelevel;

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
						
						if (rolelevel != 4)
						{
							$('#department_u').append('<option value="" selected>Select Department</option>');
							$.each(responceData.data, function(index, value) {
								$('#department_u').append('<option value="'+ index +'">'+ value +'</option>');
							});
							
							$('#team_u').empty(); // empty select
							$('#team_u').append('<option value="" selected>Select Team</option>');
							$('#input_team_u').removeAttr('style');
						}
						else
						{
							//$('#department').attr('style', 'readonly:readonly');
							$('#department_u').append('<option value="0" readonly="readonly">ALL DEPARTMENTS</option>');
							
							$('#team_u').empty(); // empty select
							$('#team_u').append('<option value="0">ALL TEAMS</option>');
							$('#input_team_u').attr('style', 'display:none');
						}
						
						/*
						$('#supervisor').append('<option value="" selected>Select a Supervisor</option>');
							
						for(var i in responceData.data)
						{
							$('#supervisor').append('<option value="'+ responceData.data[i].id +'">'+ responceData.data[i].sup_name +'</option>');
						}
						*/
					
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