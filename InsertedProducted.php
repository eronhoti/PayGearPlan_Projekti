<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserted Product</title>
    <link rel="stylesheet" href="InsertedProduct.css">
</head>
<body >


<header class="header">

<a href="#" class="logo"> <i class=""></i> PayGearPlan </a>

<nav class="navbar">
    <a href="produktet.php">Products</a>
    <a href="addProduct.php">addProducts</a>

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

 
    <div class="login-form">
        <form action="deleteProducted" method="POST">
            <?php
                 
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "products_db";

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT product_id, product_name, product_price, product_image FROM products";
                    $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '';
                                echo '<div style="margin: 1rem 0;">';
                                echo '<img src="data:image/jpeg;base64,' . base64_encode($row["product_image"]) . '" alt="' . $row["product_name"] . '" width="200px" height="150px">';
                                echo '<h3>' . $row["product_name"] . '</h3>';
                                echo '<div>' . $row["product_price"] . '</div>';
                                // Add delete button with onclick event to call JavaScript function
                                echo '<button class="btn" onclick="deleteProducted(' . $row["product_id"] . ')">Delete Product</button>';
                                echo '</div>';
                                echo '';
                            }
                        } else {
                            echo "0 results";
                            }
                            $conn->close();

            ?>
        </form>
    </div>
    
        <script>
                function deleteProducted(productId) {
                        console.log('Deleting product with ID:', productId);
                    if (confirm('Are you sure you want to delete this product?')) {
                        // Send AJAX request to delete_product.php with product ID
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'deleteProducted.php', true);
                        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState == 4) {
                                if (xhr.status == 200) {
                                    console.log('Product deleted successfully');
                                    // Reload the page after successful deletion
                                    location.reload();
                                } else {
                                    console.error('Error deleting product:', xhr.statusText);
                                    // Handle error here
                                }           
                            }
                        };
                        xhr.send('product_id=' + productId);
                    }
                }
            </script>
</body>
</html>