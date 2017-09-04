	// JavaScript Document
	$(document).ready(function () {
		// alert('hello');
		$(".form-horizontal").validate({
			highlight: function(element) {
                $(element).parent('span').addClass('help-block');
                },
            unhighlight: function(element) {
            $(element).parent('span').removeClass('help-block');
            },
			submitHandler: function(form){
				form.submit();	
			},
			errorElement: 'div',
			errorClass: "help-block",
			
			rules:{
				first_name:{
					required: true,
					// rangelength: [4,20],
					// alpha: true
				},	
				last_name:{
					required: true,
					// rangelength: [4,20],
					// alpha: true	
				},
				mobile:{
					required:true,
					// email:true	
				}
				
			}
		}); 
	});
