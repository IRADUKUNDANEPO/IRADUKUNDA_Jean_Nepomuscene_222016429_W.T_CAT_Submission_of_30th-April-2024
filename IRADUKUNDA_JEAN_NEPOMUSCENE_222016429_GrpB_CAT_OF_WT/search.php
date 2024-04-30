<?php
// Check if the 'query' GET parameter is set
if (isset($_GET['query']) && !empty($_GET['query'])) {
  
  include('Database_Connection.php');

    // Sanitize input to prevent SQL injection
    $searchTerm = $connection->real_escape_string($_GET['query']);

    // Queries for different tables
    $queries = [
        'Products' => "SELECT Product_Name FROM Product WHERE Product_Name LIKE '%$searchTerm%'",
        'Customers' => "SELECT Name FROM Customer WHERE Name LIKE '%$searchTerm%'",
        'Suppliers' => "SELECT Supplier_Name FROM Supplier WHERE Supplier_Name LIKE '%$searchTerm%'",
        'Transactions' => "SELECT Transaction_Type FROM Stock_Transaction WHERE Transaction_Type LIKE '%$searchTerm%'",
        'Orders' => "SELECT Customer_Id FROM Orders WHERE Customer_Id LIKE '%$searchTerm%'",
        'Stock In' => "SELECT Product_Id FROM Stock_in WHERE Product_Id LIKE '%$searchTerm%'",
        'Stock Out' => "SELECT Product_Id FROM Stock_out WHERE Product_Id LIKE '%$searchTerm%'"
    ];

    // Output search results
    echo "<h2><u>Search Results:</u></h2>";

    foreach ($queries as $table => $sql) {
        $result = $connection->query($sql);
        echo "<h3>Table of $table:</h3>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row[array_keys($row)[0]] . "</p>"; // Dynamic field extraction from result
            }
        } else {
            echo "<p>No results found in $table matching the search term: '$searchTerm'</p>";
        }
    }

    // Close the connection
    $connection->close();
} else {
    echo "<p>No search term was provided.</p>";
}
?>
