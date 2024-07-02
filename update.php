<?php

include('connect.php');

$id = $_GET['id'];
$name = $_POST['name'];
$category = $_POST['category'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

if ($_FILES['image']['error'] == 0) {
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_name, "uploads/" . $image);

    $sql = "UPDATE products SET name = '$name', category = '$category', description = '$description', price = '$price', quantity = '$quantity', image = '$image' WHERE id = $id";
} else {
    $sql = "UPDATE products SET name = '$name', category = '$category', description = '$description', price = '$price', quantity = '$quantity' WHERE id = $id";
}

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
