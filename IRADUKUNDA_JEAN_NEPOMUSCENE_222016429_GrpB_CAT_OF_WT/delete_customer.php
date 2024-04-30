<?php
include('Database_Connection.php');

// Check if Customer_Id is set
if(isset($_REQUEST['Customer_Id'])) {
    $custid = $_REQUEST['Customer_Id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM Customer WHERE Customer_Id=?");
    $stmt->bind_param("i", $custid);
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
            <input type="hidden" name="custid" value="<?php echo $custid; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br>
             <a href='customer.php'>OK</a>";
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
    echo "Customer_Id is not set.";
}

$connection->close();
?>
