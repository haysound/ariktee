<?php

// Define some constants
define( "RECIPIENT_NAME", "ARIKTEE LOGISTICS" );
define( "RECIPIENT_EMAIL", "arikteelogistics@gmail.com" );


// Read the form values
$success = false;
$userName = isset( $_POST['Name'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['name'] ) : "";
$senderEmail = isset( $_POST['Email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$userPhone = isset( $_POST['Phone'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
$pickUpAddress = isset( $_POST['pickUpAddress'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['pickUpAddress'] ) : "";
$deliveryAddress = isset( $_POST['deliveryAddress'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['deliveryAddress'] ) : "";

// If all values exist, send the email
if ( $userName && $senderEmail && $userPhone && $pickUpAddress && $deliveryAddress) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $userName . "";
  $msgBody = " Email: ". $senderEmail . " Phone: ". $userPhone . " Would like to send a package to : ". $pickUpAddress . " from : " . $deliveryAddress . "";
  $success = mail( $recipient, $headers, $msgBody );

  //Set Location After Successsfull Submission
  header('Location: index.html?message=Successfull');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: index.html?message=Failed');	
}

?>