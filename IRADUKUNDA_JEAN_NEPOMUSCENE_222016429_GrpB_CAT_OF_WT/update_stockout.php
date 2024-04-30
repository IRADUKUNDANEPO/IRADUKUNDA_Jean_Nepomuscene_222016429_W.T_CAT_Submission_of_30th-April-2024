<?php
include('Database_Connection.php');

$stockid = 0; // Default value

// Check if StockOut_Id is set in query string or form submission
if(isset($_REQUEST['StockOut_Id'])) {
    $stockid = $_REQUEST['StockOut_Id'];
} elseif(isset($_POST['stockid'])) {
    $stockid = $_POST['stockid'];
}

if ($stockid > 0) {
    $stmt = $connection->prepare("SELECT * FROM Stock_out WHERE StockOut_Id=?");
    $stmt->bind_param("i", $stockid);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['Stock_Transaction_Id'];
        $c = $row['Product_Id'];
        $d = $row['Customer_Id'];
        $e = $row['Transaction_date'];
        $f = $row['Quantity'];
    } else {
        echo "Product not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update new record in StockOut Table</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update StockOut form -->
    <h2><u>Update Form of StockOut</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        
            <input type="hidden" name="stockid" value="<?php echo $stockid; ?>">
            <label for="transid">Stock Transaction Id:</label>
            <input type="number" name="transid" value="<?php echo isset($b) ? $b : ''; ?>">
            <br><br>

            <label for="pid">Product Id:</label>
            <input type="number" name="pid" value="<?php echo isset($c) ? $c : ''; ?>">
            <br><br>

            <label for="custid">Customer Id:</label>
            <input type="number" name="custid" value="<?php echo isset($d) ? $d : ''; ?>">
            <br><br>

            <label for="transdate">Transaction date:</label>
            <input type="date" name="transdate" value="<?php echo isset($e) ? $e : ''; ?>">
            <br><br>

            <label for="qty">Quantity:</label>
            <input type="number" name="qty" value="<?php echo isset($f) ? $f : ''; ?>">
            <br><br>
            <input type="submit" name="upd" value="Update">
        </form>
    </center>
</body>
</html>
<?php
// Handle form submission for update
if(isset($_POST['upd'])) {
    $transid = $_POST['transid'];
    $pid = $_POST['pid'];
    $custid = $_POST['custid'];
    $transdate = $_POST['transdate'];
    $qty = $_POST['qty'];

    // Update the stockout in the database
    $stmt = $connection->prepare("UPDATE Stock_out SET Stock_Transaction_Id=?, Product_Id=?, Customer_Id=?, Transaction_date=?, Quantity=? WHERE StockOut_Id=?");
    $stmt->bind_param("iiissi", $transid, $pid, $custid, $transdate, $qty, $stockid);
    $stmt->execute();

    // Redirect to stockout.php
    header('Location: stockout.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
