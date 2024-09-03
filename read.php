<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simcrudjessie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from database
$sql = "SELECT * FROM jessieproduct";
$result = $conn->query($sql);

// Display products
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["name"] . "</td>
                <td>" . $row["description"] . "</td>
                <td>" . $row["price"] . "</td>
                <td>" . $row["quantity"] . "</td>
                <td>" . $row["barcode"] . "</td>
                <td>" . $row["created_at"] . "</td>
                <td>" . ($row["updated_at"] ? $row["updated_at"] : '') . "</td>
                <td>
                    <a href='edit.php?id=" . $row["id"] . "'>Edit</a> | 
                    <a href='delete.php?id=" . $row["id"] . "'>Delete</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='8'>No products found</td></tr>";
}

// Close connection
$conn->close();
?>
