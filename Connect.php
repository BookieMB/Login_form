<?php
// Database credentials
$servername = "localhost";
$username = "root"; // Default MySQL username
$password = ""; // Empty password for the default MySQL configuration
$database = "eval_db"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

// Close connection when you are done
$conn->close();
?>

//this

$question = $_POST['question'];

$sql = "INSERT INTO `question_table` (`Questions`) VALUES ('$question')";


$rs = mysqli_query($con, $sql);
if($rs)
{
	echo "Question has been added";
}

else
{
	echo "The question is not added";	
}
//this