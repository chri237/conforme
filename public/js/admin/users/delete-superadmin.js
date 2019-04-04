// JavaScript Documen
(function($){
	"use strict";
	
	$(document).on('click','.delete-item',function(e){
		e.preventDefault();
		var that = $(this);
		var conf = confirm('Do you realy want to delete this element?');
		
		if(conf){
			
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
							console.log(responceData.message);
							toastr.success(responceData.message,responceData.status);
							that.parent().parent().parent().parent().parent().slideUp(300);
						}else{
							console.error(responceData.message);
							toastr.error(responceData.message,responceData.status);
							$('#loader').slideUp(300);
						}


					}else{
						$('#loader').slideUp(300);
						console.log(typeof data);
						toastr.error('Bad responce!');
						console.error('Bad responce!');
					}
				},
				error: function(){
					$('#loader').slideUp(300);
					console.error('Query Error Execution Timeout!');
					toastr.error('Query Error Execution Timeout!');
				},
			});
		
		}
		
	});
	
	
	
})(jQuery);