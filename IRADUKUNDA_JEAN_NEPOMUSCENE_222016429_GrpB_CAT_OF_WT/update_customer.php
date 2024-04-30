<?php
include('Database_Connection.php');

// Check if Customer_Id is set
if(isset($_REQUEST['Customer_Id'])) {
    $custid = $_REQUEST['Customer_Id'];
    
    $stmt = $connection->prepare("SELECT * FROM Customer WHERE Customer_Id=?");
    $stmt->bind_param("i", $custid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['Product_Id'];
        $c = $row['Name'];
        $d = $row['Email'];
        $e = $row['Phone_Number'];
        $f = $row['Gender'];
    } else {
        echo "Customer not found.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update new record in Customer</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update customer form -->
    <h2><u>Update Form of Customer</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        
        <label for="pid">Product Id:</label>
        <input type="number" name="pid" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>

        <label for="custname">Customer Name:</label>
        <input type="text" name="custname" value="<?php echo isset($c) ? $c : ''; ?>">
        <br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

        <label for="custnumber">Phone Number:</label>
        <input type="text" name="custnumber" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>

        <label for="gend">Gender:</label>
          <select name="gend">
                <option value="Male" <?php if(isset($f) && $f == "Male") echo "selected"; ?>>Male</option>
                <option value="Female" <?php if(isset($f) && $f == "Female") echo "selected"; ?>>Female</option>
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
    $cusname = $_POST['custname'];
    $email = $_POST['email'];
    $cusnumber = $_POST['custnumber'];
    $gender = $_POST['gend'];
    
    // Update the customer in the database
    $stmt = $connection->prepare("UPDATE Customer SET Product_Id=?, Name=?, Email=?, Phone_Number=?, Gender=? WHERE Customer_Id=?");
    $stmt->bind_param("issssi", $pid, $cusname, $email, $cusnumber, $gender, $custid);
    $stmt->execute();
    
    // Redirect to customer.php
    header('Location: customer.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
