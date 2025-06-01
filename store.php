<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "khaadi");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from Product table
$sql = "SELECT * FROM Product";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Khaadi - Store</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Navbar -->
  <nav class="bg-orange-600 text-white p-4 shadow">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-bold">Khaadi Store</h1>
    </div>
  </nav>

  <!-- Product Display -->
  <div class="container mx-auto px-4 py-10">
    <h2 class="text-3xl font-bold text-center mb-8">Available Products</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

      <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <div class="bg-white p-4 rounded shadow hover:shadow-lg transition text-center">
            <img src="product_images/<?php echo strtolower(str_replace(' ', '', $row['Name'])) ?>.jpg" class="w-full h-64 object-cover rounded mb-4" alt="Product Image">
            <h3 class="text-xl font-semibold mb-2"><?php echo $row['Name']; ?></h3>
            <p class="text-gray-700 mb-2">Category ID: <?php echo $row['CategoryID']; ?></p>
            <p class="text-gray-700 mb-2">Brand: <?php echo $row['Brand']; ?></p>
            <p class="text-gray-700 mb-2">Price: Rs. <?php echo number_format($row['Price'], 2); ?></p>
            <p class="text-green-600"><?php echo $row['IsAvailable'] ? 'In Stock' : 'Out of Stock'; ?></p>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p class="col-span-3 text-center text-red-500">No products found.</p>
      <?php endif; ?>

    </div>
  </div>

</body>
</html>

<?php $conn->close(); ?>
