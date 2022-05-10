

<?php
	$firstName = $_POST['firstName'];
	/*message input in last name*/
	$message = $_POST['message'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	
	
	// Database connection
	//$conn = new mysqli('localhost','root','','cvsite');
	$conn = new mysqli('localhost:3306','root','','cvsite');
	if($conn->connect_errorno){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into feedbackform(firstName, message, gender, email, number) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssi", $firstName, $message, $gender, $email, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Thanks for Submitting..";
		header("Location:index.php
		");
       
		$stmt->close();
		$conn->close();

	}
?>