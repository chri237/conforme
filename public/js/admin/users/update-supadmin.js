// JavaScript Documen
(function($){
	"use strict";
	
	$('#form-update-supadmin').submit(function(e){
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
		let address = $('#address').val();
		let email = $('#email').val();
		let phone_number = $('#phone_number').val();
		let skype_id = $('#skype_id').val();
		let team_viewer_id = $('#team_viewer_id').val();
		let whatsapp = $('#whatsapp').val();
		let id = $('#sup_id').val();
		
		var dataString = "id="+id+"&whatsapp="+whatsapp+"&team_viewer_id="+team_viewer_id+"&skype_id="+skype_id+"&phone_number="+phone_number+"&email="+email+"&address="+address+"&lastname="+lastname+"&firstname="+firstname;

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
						$('#form-update-supadmin')[0].reset();
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