<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>Our Orders to Customers</title>
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
    padding:51px;
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

<body bgcolor="brown">
  
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

  <!--order form using for insertion data to database-->

<h1>Order Form</h1> 
<form method="post" onsubmit="return confirmInsert();">

<label for="ordid">Order ID:</label>
<input type="number" id="ordid" name="ordid"><br><br>

<label for="custid">Customer ID:</label>
<input type="number" id="custid" name="custid" required><br><br>

<label for="ordrdate">Order Date:</label>
<input type="date" id="ordrdate" name="ordrdate" required><br><br>

<label for="totamount">Total Amount:</label>
<input type="number" id="totamount" name="totamount" required><br><br>

<label for="status">Order Status:</label>
<input type="text" id="status" name="status" required><br><br>

<input type="submit" name="add" value="Insert"><br><br>

</form>


<!--the following codes are called INSERT codes-->

<?php
include('Database_Connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO Orders(Order_Id, Customer_Id, Order_Date, Total_Amount, Order_Status) VALUES (?, ?, ?, ?, ?)");
    
    // Corrected the types in bind_param
    $stmt->bind_param("iisds", $orderid, $cusid, $orderdate, $totalamount, $orderstatus);
    
    // Set parameters and execute
    $orderid = $_POST['ordid'];
    $cusid = $_POST['custid'];
    $orderdate = $_POST['ordrdate'];
    $totalamount = $_POST['totamount'];
    $orderstatus = $_POST['status'];
    
    if ($stmt->execute()) {
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
    <title>Detail information Of Orders of Our Customers</title>
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
    <center><h2>Table of Orders</h2></center>
    <table border="5">
        <tr><!--Order_Id  Customer_Id Order_Date  Total_Amount  Order_Status-->
            <th>Order Id</th>
            <th>Customer Id</th>
            <th>Order Date</th>
            <th>Total Amount</th>
            <th>Order Status</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        
        <?php
       include('Database_Connection.php');

        // Prepare SQL query to retrieve all orders
        $sql = "SELECT * FROM Orders";
        $result = $connection->query($sql);

        // Check if there are any orders
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $ordid = $row['Order_Id']; // Fetch the Product_Id
                echo "<tr>
                    <td>" . $row['Order_Id'] . "</td>
                    <td>" . $row['Customer_Id'] . "</td>
                    <td>" . $row['Order_Date'] . "</td>
                    <td>" . $row['Total_Amount'] . "</td>
                    <td>" . $row['Order_Status'] . "</td>
                    <td><a style='padding:4px' href='delete_order.php?Order_Id=$ordid'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_order.php?Order_Id=$ordid'>Update</a></td> 
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