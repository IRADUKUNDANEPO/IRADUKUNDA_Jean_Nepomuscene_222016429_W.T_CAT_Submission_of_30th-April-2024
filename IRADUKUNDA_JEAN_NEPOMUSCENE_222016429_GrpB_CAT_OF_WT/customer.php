<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Our Customers</title>
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

<body bgcolor="darkcyan">
  
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

  <!--customer form using for insertion data to database-->

<h1>Customer Form</h1>
    <form method="post" onsubmit="return confirmInsert();">
        <label for="custid">Customer Id:</label>
        <input type="number" id="custid" name="custid"><br><br>

        <label for="pid">Product Id:</label>
        <input type="number" id="pid" name="pid" required><br><br>

        <label for="custname">Name:</label>
        <input type="text" id="custname" name="custname" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required><br><br>

        <label for="gend">Gender:</label>
        <select name="gend" id="gend">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br><br>

        <input type="submit" name="add" value="Insert"><br><br>
    </form>


    <!--the following codes are called INSERT codes-->

<?php

include('Database_Connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO Customer(Customer_Id, Product_Id, Name, Email, Phone_Number, Gender) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissis", $custid, $pid, $cname, $email, $phonumber, $gender);
    
    // Set parameters and execute
    $custid = $_POST['custid'];
    $pid = $_POST['pid'];
    $cname = $_POST['custname'];
    $email = $_POST['email'];
    $phonumber = $_POST['phone'];
    $gender = $_POST['gend'];
   
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
    <title>Detail information Of Customer</title>
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
    <center><h2>Table of Customer</h2></center>
    <table border="5">
        <tr>
            <th>Customer Id</th>
            <th>Product Id</th>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Phone_Number</th>
            <th>Gender</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
       include('Database_Connection.php');

        // Prepare SQL query to retrieve all customers
        $sql = "SELECT * FROM Customer";
        $result = $connection->query($sql);

        // Check if there are any customers
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $cusid = $row['Customer_Id']; // Fetch the Product_Id
                echo "<tr>
                    <td>" . $row['Customer_Id'] . "</td>
                    <td>" . $row['Product_Id'] . "</td>
                    <td>" . $row['Name'] . "</td>
                    <td>" . $row['Email'] . "</td>
                    <td>" . $row['Phone_Number'] . "</td>
                    <td>" . $row['Gender'] . "</td>
                    <td><a style='padding:4px' href='delete_customer.php?Customer_Id=$cusid'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_customer.php?Customer_Id=$cusid'>Update</a></td> 
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