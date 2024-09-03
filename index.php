<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AppDevActivity1</title>
</head>
<body>
    <div>
        <h2>Add Product</h2>
        <form action="create.php" method="post">
            <label>Name: <input type="text" name="name" required></label><br>
            <label>Description: <input type="text" name="description" required></label><br>
            <label>Price: <input type="text" name="price" required></label><br>
            <label>Quantity: <input type="text" name="quantity" required></label><br>
            <label>Barcode: <input type="text" name="barcode" required></label><br>
            <input type="submit" value="Add Product">
        </form>

        <h2>Products</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Barcode</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'read.php'; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
