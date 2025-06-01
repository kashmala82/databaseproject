<?php
// Database connection settings
$host = "localhost";
$user = "root";
$password = ""; // Default for XAMPP
$db = "khaadi"; // Replace with your DB name

// Connect to MySQL
$conn = new mysqli($host, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receive form data
    $fullname = $_POST['fullname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $password = $_POST['password']; // Plain text

    // SQL INSERT
    $sql = "INSERT INTO Customer (FullName, LASTNAME, Email, Phone, Gender, DateOfBirth, Address, Password)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $fullname, $lastname, $email, $phone, $gender, $dob, $address, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!'); window.location.href='login.html';</script>";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
