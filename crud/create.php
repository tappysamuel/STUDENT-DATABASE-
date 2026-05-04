<?php
include("connect.php");
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $name = $_POST["product_name"];
    $description = $_POST["product_dspt"];
    $quantity  = $_POST["product_qty"];
    $sql = "INSERT INTO tblproduct ( product_name , product_description, product_quantity) VALUES ('$name', '$description', '$quantity')";
    if($mysqli-> query($sql) === TRUE){
        // echo "product added successfully ";
        header("Location: read.php");
        exit();
        
    }
    else
        echo  "error:" . $sql . $mysqli->error ;
    }

?>

<form action="create.php" method ="POST">
    <label>product name </label>
    <textarea name="product_name" id=""></textarea>

     <!-- <label>product price </label> -->
    <!-- <textarea name="product_price" id=""></textarea> -->
    
    <label>product description</label>
    <textarea name="product_dspt" id=""></textarea>

    <label>product quntity</label>
    <textarea name="product_qty" id=""></textarea>

<input type="submit" value = "create product">

</form>