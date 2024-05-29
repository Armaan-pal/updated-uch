
<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = '91'.$_POST['phone'];
  $comment = $_POST['comment'];
  $no_of_person = $_POST['no_of_person'];
  $date = $_POST['date'];
  $time = $_POST['time'];

  // Validate form data (you can add additional validation if needed)
  if (empty($name) || empty($email) || empty($phone) || empty($comment) || empty($no_of_person) || empty($date) || empty($time)) {
    echo 'Please fill in all required fields.';
    exit;
  }

 // Account details
	$apiKey = urlencode('MzY3NzM0NjU2MzZlNGM3YTRkNjQ1YTUyMzE3NjMwNDY=');
	
	// Message details
	$numbers = array($phone);
	$sender = urlencode('TXTLCL');
	$message = rawurlencode('This is your message');
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;

  

  // Display a success message
/*  echo 'Your Reservation request is received. We will call you shortly. While you await our call, please feel free to reach out to us at 99999999.';*/
} else {
  echo 'Invalid request.';
}
?>
