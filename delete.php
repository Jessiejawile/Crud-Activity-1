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

$id = $_GET['id'];

// Delete product from database
$sql = "DELETE FROM jessieproduct WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

// Close connection
$conn->close();

// Redirect to the index page
header("Location: index.html");
?>
