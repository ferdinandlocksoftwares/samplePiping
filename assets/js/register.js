
jQuery.noConflict();
jQuery( document ).ready(function(){
	jQuery('#fld-first-name,#fld-last-name,#fld-email,#fld-password,#fld-confirm-password').keypress(function (e) {
		var code = e.keyCode || e.which;

		if (code === 13){   
			jQuery("#btn-sign-up").click();
		}
	});

	
	jQuery("#btn-sign-up").click(function(e) {

		 jQuery(".alert").remove();
			jQuery('.has-error').removeClass('has-error');

		if(jQuery('#fld-accept-terms').prop('checked') == false){
			jQuery("html, body").animate({ scrollTop: 0 }, "slow");
			var value = "Please accept the Terms & Conditions.";
			var html = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+value+'</div>';

		   

			append_error(html);
			e.preventDefault();
		}else{

			jQuery("html, body").animate({ scrollTop: 0 }, "slow");
			jQuery("#error-message").html("Please wait....");

			email = jQuery("#fld-email").val();
			first_name = jQuery("#fld-first-name").val();
			last_name = jQuery("#fld-last-name").val();
			password = jQuery("#fld-password").val();
			confirm_password = jQuery("#fld-confirm-password").val();
			country = jQuery("#fld-country").val();

			jQuery.ajax({
				url : "<?php echo base_url()?>ajax/signupseller/signup",
				type: "post",
				data : {email : email, first_name : first_name, last_name : last_name, password : password, confirm_password : confirm_password,country : country},
				success: function(response){

					result = jQuery.parseJSON(response);
					if(result.success == "yes")
					{
						jQuery("#error-message").html("");
						//jQuery("#error-message").html(result.message);
						jQuery.ajax
						({
							url: "<?php echo base_url()?>ajax/loginuser",
							type: "post",
							data: {email: email, password: password},
							success: function (response) {
								result2 = jQuery.parseJSON(response);
								if (result2.success == "yes") {
									jQuery("#login-error-message").html("");
									//jQuery("#login-error-message").html(result2.message);
									switch (result2.type) {
										case "seller":
											fbq('track', 'Login', {
												email: email,
												date : new Date()
											});
											location.href = "<?php echo base_url();?>mypromotions";
											break;

										case "reviewer":
											fbq('track', 'Login', {
												email: email,
												date : new Date()
											});
											location.href = "<?php echo base_url();?>deals";
											break;
									}
									location.href
								}
								else {
									jQuery("#error-message").html(result2.message);
								}
							}
						});
					}
					else
					{
						jQuery("#error-message").html(result.message);
					}

				}
			});
		}

	});

	function append_error(html){
		jQuery("html, body").animate({ scrollTop: 0 }, "slow");
		jQuery('#error-container').append(html);
	}

});

		
