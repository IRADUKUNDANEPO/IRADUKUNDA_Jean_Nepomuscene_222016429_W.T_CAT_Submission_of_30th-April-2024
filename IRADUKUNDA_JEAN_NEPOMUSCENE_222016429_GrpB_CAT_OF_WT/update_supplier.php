<?php
include('Database_Connection.php');

// Check if Supplier_Id is set
if(isset($_REQUEST['Supplier_Id'])) {
    $supid = $_REQUEST['Supplier_Id'];
    
    $stmt = $connection->prepare("SELECT * FROM Supplier WHERE Supplier_Id=?");
    $stmt->bind_param("i", $supid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['Product_Id'];
        $c = $row['Supplier_Name'];
        $d = $row['Supplier_Address'];
        $e = $row['Supplier_Contact'];
        $f = $row['Gender'];
    } else {
        echo "Supplier not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update new record in Supplier Table</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update Supplier form -->
    <h2><u>Update Form of Supplier</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">

        <label for="pid">Product Id:</label>
        <input type="number" name="pid" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>

        <label for="supname">Supplier Name:</label>
        <input type="text" name="supname" value="<?php echo isset($c) ? $c : ''; ?>">
        <br><br>

        <label for="supaddress">Supplier Address:</label>
        <input type="text" name="supaddress" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

        <label for="supcontact">Supplier Contact:</label>
        <input type="text" name="supcontact" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>

        <label for="gend">Gender:</label>
          <select name="gend">
                <option <?php if(isset($f) && $f == 'Male') echo 'selected'; ?>>Male</option>
                <option <?php if(isset($f) && $f == 'Female') echo 'selected'; ?>>Female</option>
            </select>
        
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form></center> 
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $pid = $_POST['pid'];
    $supname = $_POST['supname'];
    $supaddress = $_POST['supaddress'];
    $supcontact = $_POST['supcontact'];
    $gender = $_POST['gend'];
    
    // Update the supplier in the database
    $stmt = $connection->prepare("UPDATE Supplier SET Product_Id=?, Supplier_Name=?, Supplier_Address=?, Supplier_Contact=?, Gender=? WHERE Supplier_Id=?");
    $stmt->bind_param("issssi", $pid, $supname, $supaddress, $supcontact, $gender, $supid);
    $stmt->execute();
    
    // Redirect to supplier.php
    header('Location: supplier.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
