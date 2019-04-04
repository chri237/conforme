// JavaScript Documen
(function($){
	"use strict";
	
	$('#form-update-user').submit(function(e){
		e.preventDefault();
		
		$('#loader').slideDown(300);
		var action = $(this).attr('action');
		
		 $.ajaxSetup({
			  headers: {
				  'X-CSRF-TOKEN': $('input[name="_token"]').val()
			  }
          });
		  
		let firstname = $('#firstname_u').val();
		let lastname = $('#lastname_u').val();
		let address = $('#address_u').val();
        let email = $('#email_u').val();
        let role_level = $('#role_u').val();
        let department = $('#department_u').val();
        let team = $('#team_u').val();
		let phone_number = $('#phone_number_u').val();
		let skype_id = $('#skype_id_u').val();
		let team_viewer_id = $('#team_viewer_id_u').val();
		let whatsapp = $('#whatsapp_u').val();
		let login = $('#login_u').val();
		let id = $('#id_u').val();
		
		var dataString ="id="+id+"&login="+login+"&firstname="+firstname+"&lastname="+lastname+"&phone_number="+phone_number+"&email="+email+"&address="+address+"&role_level="+role_level+"&department="+department+"&team="+team+"&skype_id="+skype_id+"&team_viewer_id="+team_viewer_id+"&whatsapp="+whatsapp;

		$.ajax({
			type : 'POST',
			url:action,
			data: dataString,
			timeout: 30000,
			success: function(data){
				if(typeof data !== 'undefined'){
					var responceData = jQuery.parseJSON(data);
					if(responceData.status === 'success'){
						toastr.success(responceData.message,responceData.status);
						$('#loader').slideUp(300);
						$('#form-update-user')[0].reset();
						console.log(responceData.data);
						
						//close modal
						$('.modal-header > .close').trigger('click');
						
						//reload datatable ajax 
						location.reload(true);
						
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