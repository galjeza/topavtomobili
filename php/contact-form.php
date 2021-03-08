<?php
if(isset($_POST["action"])) {
  $name = $_POST['name'];                 // Sender's name
  $email = $_POST['email'];     // Sender's email address
  $phone  = $_POST['phone'];     // Sender's email address
  $message = $_POST['message'];    // Sender's message  
  $headers = 'From: Avtomedvode spletna stran <avtomedvode@avtomedvode.com>' . "\r\n";    
    
  $to = 'avtomedvode@gmail.com';     // Recipient's email address
  $subject = 'Sporočilo s spletne strani';

 $body = " Od: $name \n E-Mail: $email \n Telefonska številka: $phone \n Sporočilo : $message"  ;
	
	// init error message 
	$errmsg='';
  // Check if name has been entered
  if (!$_POST['name']) {
   $errmsg = 'Prosimo vnesite ime';
  }

  
  // Check if email has been entered and is valid
  if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
   $errmsg = 'Vnesite veljavni email naslov';
  }
  
  //Check if message has been entered
  if (!$_POST['message']) {
   $errmsg = 'Vnesite sporočilo';
  }
 
	$result='';
  // If there are no errors, send the email
  if (!$errmsg) {
		if (mail ($to, $subject, $body, $headers)) {
			$result='<div class="alert alert-success">Vaše sporočilo je bilo uspešno poslano.</div>'; 
		} 
		else {
		  $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
		}
	}
	else{
		$result='<div class="alert alert-danger">'.$errmsg.'</div>';
	}
	echo $result;
 }
?>
