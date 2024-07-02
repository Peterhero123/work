<?php

include('connect.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    if ($_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp_name, "uploads/" . $image);
    } else {
        $image = "";
    }

    $sql = "INSERT INTO products (name, category, description, price, quantity, image) VALUES ('$name', '$category', '$description', '$price', '$quantity', '$image')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสินค้าใหม่</title>
</head>
<body>
    <h1>เพิ่มสินค้าใหม่</h1>

    <form action="add.php" method="post" enctype="multipart/form-data">
        <label for="name">ชื่อสินค้า:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="category">ประเภทสินค้า:</label>
        <select id="category" name="category" required>
            <option value="Hor">เสื้อผ้า</option>
            <option value="Ele">เครื่องใช้ไฟฟ้า</option>
            <option value="Furn">เฟอร์นิเจอร์</option>
        </select><br><br>

        <label for="description">รายละเอียดสินค้า:</label>
        <textarea id="description" name="description"
