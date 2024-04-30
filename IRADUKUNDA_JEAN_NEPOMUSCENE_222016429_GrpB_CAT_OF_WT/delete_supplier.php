<?php
include('Database_Connection.php');

// Check if Supplier_Id is set
if(isset($_REQUEST['Supplier_Id'])) {
    $supid = $_REQUEST['Supplier_Id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM Supplier WHERE Supplier_Id=?");
    $stmt->bind_param("i", $supid);
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
            <input type="hidden" name="supid" value="<?php echo $supid; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br>
             <a href='supplier.php'>OK</a>";
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
    echo "Supplier_Id is not set.";
}

$connection->close();
?>
