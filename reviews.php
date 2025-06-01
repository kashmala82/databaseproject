<?php
$servername = "localhost";
$username = "root";
$password = ""; // adjust if needed
$database = "khaadi"; // change to your DB name

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$customer_id = $_POST['customer_id'];
$date = $_POST['date'];
$feedback = $_POST['feedback_text'];
$rating = $_POST['rating'];

$sql = "INSERT INTO CustomerFeedback (CustomerID, Date, FeedbackText, Rating)
        VALUES ('$customer_id', '$date', '$feedback', '$rating')";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Feedback submitted successfully!'); window.location.href='feedback.html';</script>";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
