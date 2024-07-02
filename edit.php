<?php

include('connect.php');

$id = $_GET['id'];

$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขสินค้า</title>
</head>
<body>
    <h1>แก้ไขสินค้า</h1>

    <form action="update.php?id=<?php echo $row['id']; ?>" method="post" enctype="multipart/form-data">
        <label for="name">ชื่อสินค้า:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required><br><br>

        <label for="category">ประเภทสินค้า:</label>
        <select id="category" name="category" required>
            <option value="Hor" <?php if($row['category'] == "Hor") echo "selected"; ?>>เสื้อผ้า</option>
            <option value="Ele" <?php if($row['category'] == "Ele") echo "selected"; ?>>เครื่องใช้ไฟฟ้า</option>
            <option value="Furn" <?php if($row['category'] == "Furn") echo "selected"; ?>>เฟอร์นิเจอร์</option>
        </select><br><br>

        <label for="description">รายละเอียดสินค้า:</label>
        <textarea id="description" name="description"><?php echo $row['description']; ?></textarea><br><br>

        <label for="price">ราคาสินค้า:</label>
        <input type="number" id="price" name="price" value="<?php echo $row['price']; ?>" required><br><br>

        <label for="quantity">จำนวนสินค้า:</label>
        <input type="number" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>" required><br><br>

        <label for="image">รูปภาพสินค้า:</label>
        <input type="file" id="image" name="image"><br><br>

        <input type="submit" name="submit" value="บันทึก">
    </form>

</body>
</html>

<?php
} else {
    echo "ไม่พบสินค้า";
}

$conn->close();
?>
