// JavaScript Document
(function($){
	"use strict";
	
	$(document).on('click','.detaille_user',function(e){
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
							
							$('[name="firstname_d"]').val(responceData.data.firstname);
							$('[name="lastname_d"]').val(responceData.data.lastname);
							$('[name="address_d"]').val(responceData.data.address);
							$('[name="phone_number_d"]').val(responceData.data.phone_number);
                            $('[name="role_d"]').val(responceData.data.role_level);
                            $('[name="department_d"]').val(responceData.data.department);
							$('[name="team_d"]').val(responceData.data.team);
							$('[name="email_d"]').val(responceData.data.email);

							$('[name="skype_id_d"]').val(responceData.data.skype_id);
							$('[name="team_viewer_id_d"]').val(responceData.data.team_viewer_id);
							$('[name="whatsapp_d"]').val(responceData.data.whatsapp);
							$('[name="login_d"]').val(responceData.data.login);

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