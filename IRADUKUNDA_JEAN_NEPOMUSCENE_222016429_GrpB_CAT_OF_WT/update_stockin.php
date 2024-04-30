<?php
include('Database_Connection.php');

// Check if StockIn_Id is set
if(isset($_REQUEST['StockIn_Id'])) {
    $stockid = $_REQUEST['StockIn_Id'];
    
    $stmt = $connection->prepare("SELECT * FROM Stock_in WHERE StockIn_Id=?");
    $stmt->bind_param("i", $stockid); // Use 'i' for integer
    $stmt->execute();
    $result = $stmt->get_result();
   
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['StockIn_Id'];
        $y = $row['Stock_Transaction_Id'];
        $z = $row['Product_Id'];
        $w = $row['Transaction_date'];
        $r = $row['Quantity'];
    } else {
        echo "Product not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update new record in StockIn Table</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update StockIn form -->
    <h2><u>Update Form of StockIn</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        
        <label for="transid">Stock Transaction Id:</label>
        <input type="number" name="transid" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="pid">Product Id:</label>
        <input type="number" name="pid" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="transdate">Transaction date:</label>
        <input type="date" name="transdate" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <label for="qty">Quantity:</label>
        <input type="number" name="qty" value="<?php echo isset($r) ? $r : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
         
    </form></center> 
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $transid = $_POST['transid'];
    $pid = $_POST['pid'];
    $transdate = $_POST['transdate'];
    $qty = $_POST['qty'];
    
    // Update the stockin in the database
    $stmt = $connection->prepare("UPDATE Stock_in SET Stock_Transaction_Id=?, Product_Id=?, Transaction_date=?, Quantity=? WHERE StockIn_Id=?");
    $stmt->bind_param("iisdi", $transid, $pid, $transdate, $qty, $stockid); // Corrected data types and parameters order
    $stmt->execute();
    $stmt->close(); // Close the prepared statement
    
    // Redirect to stockin.php
    header('Location: stockin.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
