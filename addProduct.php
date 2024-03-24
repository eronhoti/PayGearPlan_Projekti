<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddProduct</title>

    <link rel="stylesheet" href="addProduct.css">

</head>
<body >

    <header class="header">

        <a href="index.html" class="logo"> <i class=""></i> PayGearPlan </a>
    
        <nav class="navbar">
            <a href="produktet.php">Products</a>
            <a href="InsertedProducted.php">EditProducts</a>
        </nav>
    
        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <div class="fas fa-search" id="search-btn"></div>

        </div>
    
        <form action="" class="search-form">
            <input type="search" id="search-box" placeholder="search here...">
            <label for="search-box" class="fas fa-search"></label>
        </form>
    </header>


      <!-- filloni sektori per te shtuar produktet-->
<form id="productForm" enctype="multipart/form-data" method="post">

    <div class="login-form" style="position: absolute; 
            top:35%; 
            right:15%; 
            width:35rem; 
            box-shadow: var(--box-shadow); 
            padding:2rem; 
            border-radius: .5rem; 
            background: #fff; 
            text-align: center; 
            justify-content: center;">

        <h3 style="font-size: 2.5rem; 
            text-transform: uppercase; 
            color: var(--black);">Add Products</h3>

            <label for="productName">Product Name:</label>
            <input type="text" style="width: 100%; 
                margin:.7rem 0; 
                background:#eee; 
                border-radius: .5rem; 
                padding:1rem; 
                font-size: 1.6rem; 
                color:var(--black); 
                text-transform: none;" id="productName" name="productName" required>
            
                <label for="productPrice">Price:</label>
                <input type="number" style="width: 100%; 
                    margin:.7rem 0; 
                    background:#eee; 
                    border-radius: .5rem; 
                    padding:1rem; 
                    font-size: 1.6rem; 
                    color:var(--black); 
                    text-transform: none;" id="productPrice" name="productPrice" required>
            
                        <label for="productImage">Product Image:</label>
                        <input type="file" class="btn" style="width: 300px;" id="productImage" name="productImage" accept="image/*" required>
                        <button type="submit" class="btn">Add Product</button>
   </div>
</form>

</body>
</html>

      
<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "products_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $stmt = $conn->prepare("INSERT INTO products (product_name, product_price, product_image) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $productName, $productPrice, $productImage);

    
    $productName = $_POST["productName"];
    $productPrice = $_POST["productPrice"];
    $productImage = file_get_contents($_FILES["productImage"]["tmp_name"]); // Read image file contents

    $stmt->send_long_data(2, $productImage);
    $stmt->execute();
    $stmt->close();
    $conn->close();

   
    header("Location: produktet.php");
    exit();
}else{
    echo 'product failed to add';
}
?>