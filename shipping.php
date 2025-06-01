<?php
$conn = new mysqli("localhost", "root", "", "khaadi");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerID = $_POST['customerID'];
    $addressLine = $_POST['addressLine'];
    $city = $_POST['city'];
    $postalCode = $_POST['postalCode'];
    $province = $_POST['province'];

    // Check if this CustomerID already has a shipping address
    $check = $conn->prepare("SELECT * FROM ShippingAddress WHERE CustomerID = ?");
    $check->bind_param("i", $customerID);
    $check->execute();
    $checkResult = $check->get_result();

    if ($checkResult->num_rows > 0) {
        // Update existing shipping address
        $update = $conn->prepare("UPDATE ShippingAddress SET AddressLine=?, City=?, PostalCode=?, Province=? WHERE CustomerID=?");
        $update->bind_param("ssssi", $addressLine, $city, $postalCode, $province, $customerID);
        if ($update->execute()) {
            echo "<script>alert('✅ Shipping Address Updated'); window.location.href='homepage.html';</script>";
        } else {
            echo "<script>alert('❌ Failed to update address'); window.location.href='shipping.html';</script>";
        }
    } else {
        // Insert new shipping address
        $stmt = $conn->prepare("INSERT INTO ShippingAddress (CustomerID, AddressLine, City, PostalCode, Province) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $customerID, $addressLine, $city, $postalCode, $province);
        if ($stmt->execute()) {
            echo "<script>alert('✅ Shipping Address Saved'); window.location.href='homepage.html';</script>";
        } else {
            echo "<script>alert('❌ Failed to save address'); window.location.href='shipping.html';</script>";
        }
    }
}
$conn->close();
?>