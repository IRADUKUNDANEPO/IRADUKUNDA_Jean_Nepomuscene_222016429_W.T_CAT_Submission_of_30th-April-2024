<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Our Suppliers</title>

 <style>
    /* Normal link */
    a {
      padding: 10px;
      color: white;
      background-color: pink;
      text-decoration: none;
      margin-right: 15px;
    }

    /* Visited link */
    a:visited {
      color: purple;
    }
    /* Unvisited link */
    a:link {
      color: brown; /* Changed to lowercase */
    }
    /* Hover effect */
    a:hover {
      background-color: white;
    }

    /* Active link */
    a:active {
      background-color: red;
    }

    /* Extend margin left for search button */
    button.btn {
      margin-left: 15px; /* Adjust this value as needed */
      margin-top: 4px;
    }
    /* Extend margin left for search button */
    input.form-control {
      margin-left: 1200px; /* Adjust this value as needed */

      padding: 8px;
     
    }
    section{
    padding:33px;
    border-bottom: 1px solid #ddd;
    }
    footer{
    text-align: center;
    padding: 15px;
    background-color:darkgray;
    }
  </style>
  <!-- JavaScript validation and content load for insert data-->
        <script>
            function confirmInsert() {
                return confirm('Are you sure you want to insert this record?');
            }
        </script>

  </head>

<header>

<body bgcolor="skyyellow">
    
   <!--this is form of search for any thing you want in database table-->
 <form class="d-flex" role="search" action="search.php" method="GET">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

    <!--the following are the logo and different links for used in our project-->
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">
    <img src="./Images/Logo.jpeg" width="90" height="60" alt="Logo">
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./home.html">HOME</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./about.html">ABOUT</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./contact.html">CONTACT</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./product.php">PRODUCT</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./supplier.php">SUPPLIER</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./transaction.php">TRANSACTION</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./customer.php">CUSTOMER</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./order.php">ORDERS</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./stockin.php">STOCK_IN</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./stockout.php">STOCK_OUT</a>
  </li>
  
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">Settings</a>
     <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="#">Profile</a>
        <a href="login.html">Change Other Account</a>
        <a href="logout.php">Logout</a>
      </div>
    </li><br><br>
  </ul>

</header>
<section>

<!--supplier form using for insertion data to database-->

<h1><u> Supplier Form </u></h1>
<form method="post" onsubmit="return confirmInsert();">

<label for="supid">Supplier Id:</label>
<input type="number" id="supid" name="supid"><br><br>

<label for="pid">Product Id:</label>
<input type="number" id="pid" name="pid" required><br><br>

<label for="supname">Supplier Name:</label>
<input type="text" id="supname" name="supname" required><br><br>

<label for="address">Supplier Address:</label>
<input type="text" id="address" name="address" required><br><br>

<label for="phone">Supplier Contact:</label>
<input type="text" id="phone" name="phone" required><br><br>

<label for="gend">Gender:</label>
            <select name="gend" id="gend">
                <option>Male</option>
                <option>Female</option>
            </select><br><br>

<input type="submit" name="add" value="Insert"><br><br>

</form>


<!--the following codes are called INSERT codes-->
<?php
include('Database_Connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO Supplier(Supplier_Id, Product_Id, Supplier_Name, Supplier_Address, Supplier_Contact, Gender) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $supid, $pid, $supname, $supaddress, $supcontact, $gender);
    // Set parameters from POST and execute
    $supid = $_POST['supid'];
    $pid = $_POST['pid'];
    $supname = $_POST['supname'];
    $supaddress = $_POST['address'];
    $supcontact = $_POST['phone'];
    $gender = $_POST['gend'];

   if ($stmt->execute() == TRUE) {
        echo "New record has been added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$connection->close();
?>


<!--the following codes are called VIEW OR READ codes-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of Our Suppliers</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>      
    <center><h2>Table of Suppliers</h2></center>
    <table border="5">
        <tr>
            <th>Supplier Id</th>
            <th>Product Id</th>
            <th>Supplier Name</th>
            <th>Supplier Address</th>
            <th>Supplier Contact</th>
            <th>Gender</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
       include('Database_Connection.php');

        // Prepare SQL query to retrieve all suppliers
        $sql = "SELECT * FROM Supplier";
        $result = $connection->query($sql);

        // Check if there are any suppliers
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $sup = $row['Supplier_Id']; // Fetch the Product_Id
                echo "<tr>
                    <td>" . $row['Supplier_Id'] . "</td>
                    <td>" . $row['Product_Id'] . "</td>
                    <td>" . $row['Supplier_Name'] . "</td>
                    <td>" . $row['Supplier_Address'] . "</td>
                    <td>" . $row['Supplier_Contact'] . "</td>
                    <td>" . $row['Gender'] . "</td>
                    <td><a style='padding:4px' href='delete_supplier.php?Supplier_Id=$sup'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_supplier.php?Supplier_Id=$sup'>Update</a></td> 
                </tr>";         
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
</body>

</section>


  
<footer>
  <marquee behavior='alternate'> 
<b><h2>UR CBE BIT &copy, 2024 &reg, Designer by: @Jean Nepo IRADUKUNDA</h2></b>
</marquee>
<center><b><i>&copy 2024 All Rights Reserved</i></b></center>
</footer>
</body>
</html>