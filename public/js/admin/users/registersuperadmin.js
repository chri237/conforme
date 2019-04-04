// JavaScript Documen
(function($){
	"use strict";
	
	$('#create-super-admin').submit(function(e){
		e.preventDefault();
		
		$('#loader').slideDown(300);
		var action = $(this).attr('action');
		 $.ajaxSetup({
			  headers: {
				  'X-CSRF-TOKEN': $('input[name="_token"]').val()
			  }
          });
		
		let firstname = $('#firstname').val();
		let lastname = $('#lastname').val();
		let phone_number = $('#phone_number').val();
		let email = $('#email').val();
		let address = $('#address').val();
        	
		let skype_id = $('#skype_id').val();
		let team_viewer_id = $('#team_viewer_id').val();
		let whatsapp = $('#whatsapp').val();
		let login = $('#login').val();
		let password = $('#password').val();
		//let type_ressource = $('#type_ressource').val();

		var dataString = "firstname="+firstname+"&lastname="+lastname+"&phone_number="+phone_number+"&email="+email+"&address="+address+"&skype_id="+skype_id+"&team_viewer_id="+team_viewer_id+"&whatsapp="+whatsapp+"&login="+login+"&password="+password;

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
                        toastr.success(responceData.message,responceData.status);
                        
                        $('#create-super-admin')[0].reset();
                        console.log(responceData.data);
						
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