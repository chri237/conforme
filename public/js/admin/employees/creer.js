// JavaScript Documen
(function($){
	"use strict";

	$('#create-employee').submit(function(e){
		e.preventDefault();

		$('#loader').slideDown(300);
		var action = $(this).attr('action');
		 $.ajaxSetup({
			  headers: {
				  'X-CSRF-TOKEN': $('input[name="_token"]').val()
			  }
          });

		let nom = $('#nom').val();
		let prenom = $('#prenom').val();
		let tel1 = $('#tel1').val();
    let tel2 = $('#tel2').val();
		let email = $('#email').val();
		let adresse = $('#adresse').val();
		let poste = $('#poste').val();
		let whatsapp = $('#whatsapp').val();
		let login = $('#login').val();
		let password = $('#password').val();
		//let type_ressource = $('#type_ressource').val();

		var dataString ="nom="+nom+"&prenom="+prenom+"&tel1="+tel1+"&tel2="+tel2+"&email="+email+"&adresse="+adresse+"&poste="+poste+"&whatsapp="+whatsapp+"&login="+login+"&password="+password;

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

                        $('#create-employee')[0].reset();
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
