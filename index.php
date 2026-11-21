<!DOCTYPE html>
<html>
<head>
    <title>Product Management</title>
    <style>
        table { width: 50%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
    </style>
</head>
<body>

    <h2>Product Management System</h2>

    <fieldset>
        <legend>Add New Product</legend>
        <form action="process.php" method="POST">
            ID: <input type="number" name="id" required>
            Name: <input type="text" name="Name" required>
            Price: <input type="number" step="0.01" name="Price" required>
            <button type="submit" name="btn_insert">Insert Product</button>
        </form>
    </fieldset>

    <br>

    <fieldset>
        <legend>Manage Existing Product</legend>
        <form action="process.php" method="POST">
            Product ID: <input type="number" name="id" required>
            <button type="submit" name="btn_delete">Delete Product</button>
            <button type="submit" name="btn_search">Show Details</button>
        </form>
    </fieldset>

</body>
</html>