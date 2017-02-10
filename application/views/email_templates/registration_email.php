
<html>
	<head>
		
	</head>
	
	<body>
		Hello <?php echo $seller_data["first_name"]; ?>,
		<br/><br/>
		Thank you for signing up. Please click the link below to verify your registration:
		<br/>
		<a href="<?php echo $registration_data["verification_link"]; ?>"><?php echo $registration_data["verification_link"]; ?></a>
		<br/>
		<br/>
		Regards,
		<br/>
		Trendle Deals Team
	</body>
	
</html>
