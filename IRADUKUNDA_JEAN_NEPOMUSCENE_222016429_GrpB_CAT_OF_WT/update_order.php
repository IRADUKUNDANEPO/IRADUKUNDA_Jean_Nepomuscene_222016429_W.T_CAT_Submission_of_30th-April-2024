<?php
include('Database_Connection.php');

// Check if Order_Id is set
if(isset($_REQUEST['Order_Id'])) {
    $ordid = $_REQUEST['Order_Id'];
    
    $stmt = $connection->prepare("SELECT * FROM Orders WHERE Order_Id=?");
    $stmt->bind_param("i", $ordid);
    $stmt->execute();
    $result = $stmt->get_result();
   
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['Order_Id'];
        $y = $row['Customer_Id'];
        $z = $row['Order_Date'];
        $w = $row['Total_Amount'];
        $p = $row['Order_Status'];
    } else {
        echo "Order not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update new record in Order</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update order form -->
    <h2><u>Update Form of Order</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">

        <label for="custid">Customer Id:</label>
        <input type="text" name="custid" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="orderdate">Order Date:</label>
        <input type="date" name="orderdate" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="totamount">Total Amount:</label>
        <input type="number" name="totamount" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <label for="orderstatus">Order Status:</label>
        <input type="text" name="orderstatus" value="<?php echo isset($p) ? $p : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form></center> 
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $custid = $_POST['custid'];
    $orderdate = $_POST['orderdate'];
    $totamount = $_POST['totamount'];
    $orderstatus = $_POST['orderstatus'];
    
    // Update the order in the database
    $stmt = $connection->prepare("UPDATE Orders SET Customer_Id=?, Order_Date=?, Total_Amount=?, Order_Status=? WHERE Order_Id=?");
    $stmt->bind_param("ssdsi", $custid, $orderdate, $totamount, $orderstatus, $ordid);
    $stmt->execute();
     
    // Redirect to order.php
    header('Location: order.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
