// JavaScript Document
(function($){
	"use strict";
	
	$(document).on('click','.update-supadmin',function(e){
		e.preventDefault();
		var that = $(this);
			
			$('#loader').slideDown(300);
			
			var action = $(this).attr('href');
			 $.ajaxSetup({
				  headers: {
					  'X-CSRF-TOKEN': $('input[name="_token"]').val()
				  }
			  });

			let id = $('this').attr('data-slug');
			
			var dataString = "id="+id;

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
							$('#form-update-supadmin')[0].reset();
							console.log(responceData.data);
							
							$('[name="firstname"]').val(responceData.data.firstname);
							$('[name="lastname"]').val(responceData.data.lastname);
							$('[name="address"]').val(responceData.data.address);
							$('[name="phone_number"]').val(responceData.data.phone_number);
							$('[name="email"]').val(responceData.data.email);
							$('[name="skype_id"]').val(responceData.data.skype_id);
							$('[name="team_viewer_id"]').val(responceData.data.team_viewer_id);
							$('[name="whatsapp"]').val(responceData.data.whatsapp);
							$('[name="sup_id"]').val(responceData.data.id);
							
							
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