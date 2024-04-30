<?php
include('Database_Connection.php');

// Check if Product_Id is set
if(isset($_REQUEST['Product_Id'])) {
    $pid = $_REQUEST['Product_Id'];
    
    $stmt = $connection->prepare("SELECT * FROM Product WHERE Product_Id=?");
    $stmt->bind_param("i", $pid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['Product_Id'];
        $y = $row['Product_Name'];
        $z = $row['Product_Desciption'];
        $w = $row['Product_Price'];
    } else {
        echo "Product not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update new record in Product Table</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update product form -->
    <h2><u>Update Form of Product</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">

        <label for="pname">Product Name:</label>
        <input type="text" name="pname" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="pdescription">Product Description:</label>
        <input type="text" name="pdescription" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="pprice">Product Price:</label>
        <input type="number" name="pprice" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $product_name = $_POST['pname'];
    $product_description = $_POST['pdescription'];
    $product_price = $_POST['pprice'];
    
    // Update the product in the database
    $stmt = $connection->prepare("UPDATE Product SET Product_Name=?, Product_Desciption=?, Product_Price=? WHERE Product_Id=?");
    $stmt->bind_param("ssdi", $product_name, $product_description, $product_price, $pid);
    $stmt->execute();
    
    // Redirect to product.php
    header('Location: product.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
