<?php
$conn = new mysqli("localhost", "root", "", "khaadi");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Product";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Khaadi - Products</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function storeProductData(name, price, image) {
      localStorage.setItem("productName", name);
      localStorage.setItem("productPrice", price);
      localStorage.setItem("productImage", image);
      window.location.href = "PURCHASEORDER.HTML";
    }
  </script>
</head>
<body class="bg-gray-100 text-gray-800">

<nav class="bg-orange-600 text-white p-4 shadow">
    <div class="container mx-auto flex justify-between items-center">
      <div class="flex items-center gap-3">
        <img src="aa.jpg" alt="Khaadi Logo" class="h-10" />
      </div>
      <ul class="flex gap-6 text-sm">
        <li><a href="homepage.html" class="hover:underline">Home</a></li>
        <li><a href="PRODUCT.PHP" class="hover:underline">Products</a></li>
        <li><a href="register.html" class="hover:underline">Register</a></li>
        <li><a href="login.html" class="hover:underline">Login</a></li>
                <li><a href="reviews.html" class="hover:underline">reviews</a></li>
      </ul>
    </div>
  </nav>

<!-- Product Grid -->
<div class="container mx-auto px-4 py-10">
  <h2 class="text-3xl font-bold text-center mb-8">Our Products</h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

    <?php if ($result->num_rows > 0): ?>
      <?php while($row = $result->fetch_assoc()): ?>
        <?php
          $image = "product_images/" . strtolower(str_replace(" ", "", $row['Name'])) . ".jpg";
        ?>
        <div class="bg-white p-4 rounded shadow text-center">
          <img src="<?php echo $image; ?>" class="w-full h-64 object-cover rounded mb-4" alt="Product Image">
          <h3 class="text-xl font-semibold"><?php echo $row['Name']; ?></h3>
          <p class="text-gray-700">Category ID: <?php echo $row['CategoryID']; ?></p>
          <p class="text-gray-700">Brand: <?php echo $row['Brand']; ?></p>
          <p class="text-gray-700">Price: Rs. <?php echo $row['Price']; ?></p>
          <p class="text-green-600"><?php echo $row['IsAvailable'] ? 'In Stock' : 'Out of Stock'; ?></p>
          <button onclick="storeProductData('<?php echo $row['Name']; ?>', '<?php echo $row['Price']; ?>', '<?php echo $image; ?>')" class="mt-3 bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700">
            Order Now
          </button>
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
