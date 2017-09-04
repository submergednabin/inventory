	// JavaScript Document
	$(document).ready(function () {
		
		$("#employer-form").validate({
			submitHandler: function(form){
				form.submit();	
			},
			errorElement: 'div',
			errorClass: "help-block",
			
			rules: {
				entity_name:{
					required: true
				}
			}
		}); 
	});
