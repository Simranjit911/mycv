<?php
	$firstName = $_POST['firstName'];
	/*message input in last name*/
	$message = $_POST['message'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$number = $_POST['number'];

$servername = "localhost";
$database = "id18897337_mydatabase";
$username = "id18897337_simran";
$password = "j]G8Nx1?oh|lL]AI";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

// if ($conn->connect_error) {
// die("Connection failed: " . $conn->connect_error);
// }

// echo "Connected successfully";

// mysqli_close($conn);
if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into feedbackform(firstName, message, gender, email, number) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssi", $firstName, $message, $gender, $email, $number);
		$execval = $stmt->execute();
		echo $execval;
			echo "Thanks for Submitting..Redirecting to Home";
	 echo "<script>window.location.href='index.php';</script>";
    exit;
       
		$stmt->close();
		$conn->close();
		

	//	header("Location:index.php");
	//	exit();
	}

?>