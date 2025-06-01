<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "khaadi";

// Connect to database
$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['productName'];
    $purchasePrice = $_POST['purchasePrice'];
    $quantity = $_POST['quantity'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $totalAmount = $_POST['totalAmount'];
    $action = $_POST['action']; // 'cart' or 'buy'

    // Insert into PurchaseOrderDetails table
    $sql = "INSERT INTO PurchaseOrderDetails (Quantity, PurchasePrice)
            VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("id", $quantity, $purchasePrice);

    if ($stmt->execute()) {
        if ($action === "cart") {
            echo "<script>alert('✅ Added to cart!'); window.location.href='product.php';</script>";
        } else if ($action === "buy") {
            echo "<script>alert('✅ Purchase recorded! Redirecting to login...'); window.location.href='login.html';</script>";
        }
    } else {
        echo "<script>alert('❌ Failed to process your purchase.'); window.location.href='purchase.html';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
