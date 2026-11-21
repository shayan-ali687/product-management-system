
<?php
$con = new mysqli('localhost', 'root', '', 'october');

if ($con->connect_error) {
    die("Database connection failed.");
}

// INSERT PRODUCT
if (isset($_POST['btn_insert'])) {

    $id = $_POST['id'];
    $Name = $_POST['Name'];
    $Price = $_POST['Price'];

    $stmt = $con->prepare(
        "INSERT INTO Products (id, Name, Price) VALUES (?, ?, ?)"
    );

    $stmt->bind_param("isd", $id, $Name, $Price);

    if ($stmt->execute()) {
        echo "<h3>Product Inserted Successfully!</h3>";
    } else {
        echo "<h3>Could not insert product.</h3>";
    }

    $stmt->close();
    echo "<a href='index.php'>Go Back</a>";
}

// DELETE PRODUCT
if (isset($_POST['btn_delete'])) {

    $id = $_POST['id'];

    $stmt = $con->prepare(
        "DELETE FROM Products WHERE id = ?"
    );

    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<h3>Product Deleted Successfully!</h3>";
    } else {
        echo "<h3>Product not found.</h3>";
    }

    $stmt->close();
    echo "<a href='index.php'>Go Back</a>";
}

// SEARCH PRODUCT
if (isset($_POST['btn_search'])) {

    $id = $_POST['id'];

    $stmt = $con->prepare(
        "SELECT * FROM Products WHERE id = ?"
    );

    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {

        echo "<h3>Product Details:</h3>";

        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
                <tr>
                    <td>" . htmlspecialchars($row['id']) . "</td>
                    <td>" . htmlspecialchars($row['Name']) . "</td>
                    <td>" . htmlspecialchars($row['Price']) . "</td>
                </tr>
              </table>";

    } else {
        echo "<h3>No product found.</h3>";
    }

    $stmt->close();
    echo "<br><a href='index.php'>Go Back</a>";
}

$con->close();
?>
