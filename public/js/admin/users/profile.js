// JavaScript Documen
(function($){
	"use strict";
	
	// request get details of the current input selected
	$(document).on('click','.item-profile',function(e){
		//e.preventDefault();
		
		$('#loader').slideDown(300);
		
		
		var action = $(this).attr('href');
		
		 $.ajaxSetup({
			  headers: {
				  'X-CSRF-TOKEN': $('input[name="_token"]').val()
			  }
          });
		
		let slug = $(this).attr('data-slug');
		
		console.log(slug);
		

		var dataString = "slug="+slug;

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
						$('.psubmit').attr('disabled',false);
						
						$('#plogin').attr('disabled',false);
						$('#ppassword').attr('disabled',false);
                        console.log(responceData.data);
						
						
						$('#plogin').val(responceData.data.login);
						$('#ppassword').val(responceData.data.password);
						$('#pslug').val(responceData.data.slug);
						
					}else{
						$('#loader').slideUp(300);
						toastr.error(responceData.message,responceData.status);
					}


				}else{
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
	
	// request to update the form update input fullfilled
	$('#form-profile').submit(function(e){
		e.preventDefault();
		
		$('#loader').slideDown(300);
		var action = $(this).attr('action');
		 $.ajaxSetup({
			  headers: {
				  'X-CSRF-TOKEN': $('input[name="_token"]').val()
			  }
          });
		
		 
		let login = $('#plogin').val();
		let password = $('#ppassword').val();
		let slug = $('#pslug').val();
		

		var dataString = "slug="+slug+"&password="+password+"&login+="+login;

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
						$('.modal-header > .close').trigger('click');
                        toastr.success(responceData.message,responceData.status);
                        
                        $('#form-profile')[0].reset();
                        console.log(responceData.data);
						
						//var content = $('<tr class="hilight"><td> '+responceData.data.title_input+' </td><td>  '+responceData.data.description_input+' </td><td><div class="btn-group btn-group-lg"><button class="btn btn-info dropdown-toggle" data-toggle="dropdown" type="button">Action <i class="dropdown-caret fa fa-chevron-down"></i></button><ul class="dropdown-menu"><li class="dropdown-header">Selct action</li><li><a href="#" data-slug="'+responceData.data.slug+'" data-toggle="modal" data-target="#detailsInput" class="get-details-role item-details">Details</a></li><li><a href="#" data-slug="'+responceData.data.slug+'" data-toggle="modal" data-target="#updateInputForm" class="update-role">Update</a></li><li><a href="#" data-slug="'+responceData.data.slug+'" class="delete-role">Delete</a></li></ul></div></td></tr>');
						//$('table.response-datas tbody').prepend(content);
						
						$('.tr-'+slug).children().first().text(responceData.data.dep_name);
						$('.tr-'+slug).children().first().next().text(responceData.data.team_name);
						$('.tr-'+slug).children().first().next().text(responceData.data.role_name);
						
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