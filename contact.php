<?php
			// start mail processing here... 
			if(isset($_POST["fullname"]) && isset($_POST["email"]) && isset($_POST["message"])){
				
				$mail_to = "info@rgc.co.ug";
				
				$subject = "";//$_POST[""];
				$name = $_POST["fullname"];
				$email = $_POST["email"];
				
				$message = $_POST["message"];
				$email_message = "";
				
						function clean_string( $string ) {
							$bad = array ("content-type" , "bcc:" , "to:" ,"cc:" ,"href" );
							return str_replace ($bad , "" ,$string);
						}
						
						
						$cleanmail = clean_string($email);
						if(filter_var($cleanmail,FILTER_VALIDATE_EMAIL)){
							$email_message .= "From: ".clean_string($email)."\n";
						}else{
							$email_message .= "Email: Invalid\n";
						}
						$email_message .= "Message:\n\n ".clean_string($message)."\n\nReply to ".clean_string($email);
						// create email headers
						$headers = 'Reply-To: ' . $email ."\r\n" .'X-Mailer: PHP/' . PHP_VERSION;
						
						
						if(mail($mail_to, $subject, $email_message, $headers)){
								echo <<<_END
									<div class="col-xs-12 col-sm-12 col-md-12 alert alert-success"><button class="close" type="button" data-dismiss="alert" aria-hidden="true" >&times;</button>
										Your comment has been delivered. check you mail box for a response.
									</div>
_END;
}
else{
			echo "nothing was submitted";}
				
			}
?>
	<link rel="stylesheet" href="../styles/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../styles/js/bootstrap.min.js" />
			<a class="btn btn-primary " href="index.html" alt="home" >Go Home</a>