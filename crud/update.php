<?php
include('connect.php');
session_start();

// Check if 'id' parameter is set in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the product data from the database
    $sql = "SELECT * FROM tblproduct WHERE product_id = $id";
    $result = $mysqli->query($sql);

    // Check if the query was successful and the product was found
    if ($result && $result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found!";
        exit();
    }
} else {
    echo "Invalid product ID!";
    exit();
}

// If form is submitted, update the product in the database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['product_name'];
    // $price = $_POST['product_price'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];


    // Update query with correct column name 'product_id'
    $sql = "UPDATE tblproduct SET product_name = '$name', product_description = '$description', product_quantity = '$quantity' WHERE product_id = $id";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: read.php");
        exit();
    } else {
        echo "Error updating product: " . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>
    <h2>Update Product</h2>
    <form method="POST" action="">
        Name: <input type="text" name="product_name" value="<?php echo htmlspecialchars($product['product_name']); ?>" required><br>
        <!-- Price: <input type="text" name="product_price" value="<?php echo htmlspecialchars($product['product_price']); ?>" required><br> -->
        Description: <textarea name="description" required><?php echo htmlspecialchars($product['product_description']); ?></textarea><br>
        Quantity: <textarea name="quantity" required><?php echo htmlspecialchars($product['product_quantity']); ?></textarea><br>

        <input type="submit" value="Update Product">
    </form>
</body>
</html>