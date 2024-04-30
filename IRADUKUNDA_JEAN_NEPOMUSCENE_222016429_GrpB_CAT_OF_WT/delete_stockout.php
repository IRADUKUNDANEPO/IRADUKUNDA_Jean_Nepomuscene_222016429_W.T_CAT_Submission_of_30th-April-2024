<?php
include('Database_Connection.php');

// Check if StockOut_Id is set
if(isset($_REQUEST['StockOut_Id'])) {
    $stkid = $_REQUEST['StockOut_Id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM Stock_out WHERE StockOut_Id=?");
    $stmt->bind_param("i", $stkid);
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
            <input type="hidden" name="stkid" value="<?php echo $stkid; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br>
             <a href='stockout.php'>OK</a>";
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
    echo "StockOut_Id is not set.";
}

$connection->close();
?>
