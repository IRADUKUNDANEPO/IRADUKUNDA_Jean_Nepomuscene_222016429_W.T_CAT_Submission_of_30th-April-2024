<?php
include('Database_Connection.php');

$transid = isset($_GET['Stock_Transaction_Id']) ? $_GET['Stock_Transaction_Id'] : null;

if ($transid) {
    $stmt = $connection->prepare("SELECT * FROM Stock_transaction WHERE Stock_Transaction_Id=?");
    $stmt->bind_param("i", $transid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pid = $row['Product_Id'];
        $transtype = $row['Transaction_Type'];
        $qty = $row['Quantity'];
        $transdate = $row['Transaction_Date'];
    } else {
        echo "Transaction not found.";
    }
    $stmt->close(); // Close statement after fetching data
} else {
    echo "Missing Transaction ID.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update new record in Stock Transaction Table</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update Stock Transaction form -->
    <h2><u>Update Form of Stock Transaction</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">

    <input type="hidden" name="transid" value="<?php echo $transid; ?>">
    <label for="pid">Product Id:</label>
    <input type="text" name="pid" value="<?php echo isset($pid) ? $pid : ''; ?>">
    <br><br>

    <label for="transtype">Transaction Type:</label>
    <input type="text" name="transtype" value="<?php echo isset($transtype) ? $transtype : ''; ?>">
    <br><br>

    <label for="qty">Quantity:</label>
    <input type="number" name="qty" value="<?php echo isset($qty) ? $qty : ''; ?>"><br><br>

    <label for="transdate">Transaction Date:</label>
    <input type="date" name="transdate" value="<?php echo isset($transdate) ? $transdate : ''; ?>"><br><br>

    <input type="submit" name="updt" value="Update">
  </form>
</center>
</body>
</html>
<?php
if (isset($_POST['updt'])) {
    $pid = $_POST['pid'];
    $transtype = $_POST['transtype'];
    $qty = $_POST['qty'];
    $transdate = $_POST['transdate'];
    $transid = $_POST['transid']; // Ensure transid is fetched from POST

    $stmt = $connection->prepare("UPDATE Stock_transaction SET Product_Id=?, Transaction_Type=?, Quantity=?, Transaction_Date=? WHERE Stock_Transaction_Id=?");
    $stmt->bind_param("isssi", $pid, $transtype, $qty, $transdate, $transid);

    if ($stmt->execute()) {
        echo "Transaction updated successfully! <br><br>
             <a href='transaction.php'>OK</a>";
        // Consider redirecting to a success page or displaying confirmation
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>
