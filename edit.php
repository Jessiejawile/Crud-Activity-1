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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from POST
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $barcode = $_POST['barcode'];

    // Update data in database
    $sql = "UPDATE jessieproduct 
            SET name='$name', description='$description', price='$price', quantity='$quantity', barcode='$barcode', updated_at=NOW() 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Redirect to the index page
    header("Location: index.html");
} else {
    // Fetch product data
    $sql = "SELECT * FROM jessieproduct WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found";
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h2>Edit Product</h2>
    <form action="" method="post">
        <label>Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required></label><br>
        <label>Description: <input type="text" name="description" value="<?php echo $row['description']; ?>" required></label><br>
        <label>Price: <input type="text" name="price" value="<?php echo $row['price']; ?>" required></label><br>
        <label>Quantity: <input type="text" name="quantity" value="<?php echo $row['quantity']; ?>" required></label><br>
        <label>Barcode: <input type="text" name="barcode" value="<?php echo $row['barcode']; ?>" required></label><br>
        <input type="submit" value="Update Product">
    </form>
</body>
</html>
