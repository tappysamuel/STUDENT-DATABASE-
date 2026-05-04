<?php
include('connect.php');

// Check if 'id' parameter is set in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval( $_GET['id']);

    // Check if the product exists
    $sql = "SELECT * FROM tblproduct WHERE product_id = $id";
    $result = $mysqli->query($sql);

    if ($result && $result->num_rows > 0) {
        // Product exists, proceed to delete
        $delete_sql = "UPDATE tblproduct SET product_status ='inactive' WHERE product_id = $id";

        if ($mysqli->query($delete_sql) === TRUE) {
            echo "Product deleted successfully";
            header("Location: read.php"); // Redirect to the product listing page
            exit();
        } else {
            echo "Error deleting product: " . $mysqli->error;
        }
    } else {
        echo "Product not found!";
    }
} else {
    echo "Invalid product ID!";
}
?>