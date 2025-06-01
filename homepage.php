<?php
// session_start(); // Uncomment if using sessions
// include 'connection.php'; // Uncomment if connecting to DB
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Khaadi - Home</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">

  <!-- Navbar -->
  <nav class="bg-orange-600 text-white p-4 shadow">
    <div class="container mx-auto flex justify-between items-center">
      <div class="flex items-center gap-3">
        <img src="aa.jpg" alt="Khaadi Logo" class="h-10" />
      </div>
      <ul class="flex gap-6 text-sm font-semibold">
        <li><a href="homepage.php" class="hover:underline">Home</a></li>
        <li><a href="product.php" class="hover:underline">Products</a></li>
        <li><a href="order.php" class="hover:underline">Order</a></li>
        <li><a href="register.php" class="hover:underline">Register</a></li>
        <li><a href="login.php" class="hover:underline">Login</a></li>
        <li><a href="reviews.php" class="hover:underline">Reviews</a></li>
      </ul>
    </div>
  </nav>

  <!-- Hero Banner -->
  <section class="bg-cover bg-center h-[450px] flex items-center justify-center text-white"
           style="background-image: url('https://source.unsplash.com/featured/?fashion,clothing');">
    <div class="bg-black bg-opacity-50 p-10 rounded text-center">
      <h2 class="text-4xl font-bold mb-4">Discover the Latest Trends</h2>
      <p class="text-lg mb-4">Stylish | Affordable | Khaadi Originals</p>
      <a href="product.php" class="bg-orange-500 hover:bg-orange-700 px-6 py-2 rounded font-semibold">Shop Now</a>
    </div>
  </section>

  <!-- Categories -->
  <section class="py-12 bg-gray-100">
    <div class="container mx-auto text-center">
      <h3 class="text-2xl font-semibold mb-6">Shop by Category</h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 px-6">
        <div class="bg-white p-4 rounded shadow hover:shadow-lg">
          <img src="EASTERN WEAR.jpg" alt="Women" class="h-64 w-full object-cover rounded mb-3">
          <h4 class="text-xl font-bold">Women</h4>
        </div>
        <div class="bg-white p-4 rounded shadow hover:shadow-lg">
          <img src="men.jpg" alt="Men" class="h-64 w-full object-cover rounded mb-3">
          <h4 class="text-xl font-bold">Men</h4>
        </div>
        <div class="bg-white p-4 rounded shadow hover:shadow-lg">
          <img src="kids.jpg" alt="Kids" class="h-64 w-full object-cover rounded mb-3">
          <h4 class="text-xl font-bold">Kids</h4>
        </div>
      </div>
    </div>
  </section>

  <!-- Why Shop With Us -->
  <section class="py-12">
    <div class="container mx-auto text-center">
      <h3 class="text-2xl font-semibold mb-6">Why Shop With Khaadi?</h3>
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 px-6">
        <div class="p-4 bg-orange-50 rounded shadow">
          <h4 class="text-xl font-bold mb-2">🚚 Free Shipping</h4>
          <p>On orders above Rs. 3,000</p>
        </div>
        <div class="p-4 bg-orange-50 rounded shadow">
          <h4 class="text-xl font-bold mb-2">🔁 Easy Returns</h4>
          <p>14-day hassle-free returns</p>
        </div>
        <div class="p-4 bg-orange-50 rounded shadow">
          <h4 class="text-xl font-bold mb-2">⭐ Trusted Quality</h4>
          <p>Original Khaadi products guaranteed</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-100 text-center py-6 text-sm text-gray-600">
    &copy; 2025 Khaadi. All rights reserved.
  </footer>

</body>
</html>

