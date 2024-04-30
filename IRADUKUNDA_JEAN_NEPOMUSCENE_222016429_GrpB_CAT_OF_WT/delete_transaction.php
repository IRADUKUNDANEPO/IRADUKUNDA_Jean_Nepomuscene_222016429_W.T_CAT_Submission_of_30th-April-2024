<?php
include('Database_Connection.php');

// Check if Stock_Transaction_Id is set
if(isset($_REQUEST['Stock_Transaction_Id'])) {
    $transid = $_REQUEST['Stock_Transaction_Id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM Stock_transaction WHERE Stock_Transaction_Id=?");
    $stmt->bind_param("i", $transid);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Record</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body>
        <form method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="transid" value="<?php echo $transid; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br>
             <a href='transaction.php'>OK</a>";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }
}
?>
</body>
</html>
<?php

    $stmt->close();
} else {
    echo "Stock_Transaction_Id is not set.";
}

$connection->close();
?>
