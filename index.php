<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: user_login.php');
    exit();
}

// Fetch products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>eRetail Hub</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header>
        <h1>Welcome to eRetail Hub</h1>
        <a href="cart.php">Cart</a> | <a href="order_history.php">Order History</a> | <a href="user_logout.php">Logout</a>
    </header>
    <main>
        <h2>All Products</h2>
        <div class="products">
            <?php while($row = $result->fetch_assoc()) { ?>
                <div class="product-item">
                    <img src="assets/logo.png" alt="Product Image">
                    <h3><?php echo $row['name']; ?></h3>
                    <p><?php echo $row['description']; ?></p>
                    <p>₹<?php echo $row['price']; ?></p>
                    <a href="product.php?id=<?php echo $row['id']; ?>">View</a>
                </div>
            <?php } ?>
        </div>
    </main>
</body>
</html>
