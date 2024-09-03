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

// Get data from POST
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$barcode = $_POST['barcode'];

// Insert data into database
$sql = "INSERT INTO jessieproduct (name, description, price, quantity, barcode, updated_at) 
        VALUES ('$name', '$description', '$price', '$quantity', '$barcode', NULL)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();

// Redirect to the index page
header("Location: index.html");
?>
