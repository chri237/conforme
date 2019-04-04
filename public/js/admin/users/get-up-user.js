// JavaScript Document
(function($){
	"use strict";
	
	$(document).on('click','.update-user',function(e){
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
							$('#form-update-user')[0].reset();
							console.log(responceData.data);
							
							$('[name="firstname_u"]').val(responceData.data.firstname);
							$('[name="lastname_u"]').val(responceData.data.lastname);
							$('[name="address_u"]').val(responceData.data.address);
							$('[name="phone_number_u"]').val(responceData.data.phone_number);
                            $('[name="role_u"]').val(responceData.data.role_level);
                            $('[name="department_u"]').val(responceData.data.department);
							$('[name="team_u"]').val(responceData.data.team);
							$('[name="email_u"]').val(responceData.data.email);
							$('[name="login_u"]').val(responceData.data.login);

							$('[name="skype_id_u"]').val(responceData.data.skype_id);
							$('[name="team_viewer_id_u"]').val(responceData.data.team_viewer_id);
							$('[name="whatsapp_u"]').val(responceData.data.whatsapp);
							$('[name="id_u"]').val(responceData.data.id);
							
							
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