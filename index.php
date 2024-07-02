<?php

include('connect.php');

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<a href='add.php'>เพิ่มรายสินค้า</a>";
    echo "<table>";
        echo "<tr>";
            echo "<th>ลำดับ</th>";
            echo "<th>รูปภาพสินค้า</th>";
            echo "<th>ชื่อสินค้า</th>";
            echo "<th>ประเภทสินค้า</th>";
            echo "<th>รายละเอียดสินค้า</th>";
            echo "<th>ราคาสินค้า</th>";
            echo "<th>จำนวนสินค้า</th>";
            echo "<th>แก้ไข</th>";
            echo "<th>ลบ</th>";
        echo "</tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td><img src='uploads/" . $row["image"] . "' width='100'></td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["category"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td>" . $row["quantity"] . "</td>";
            echo "<td><a href='edit.php?id=" . $row["id"] . "'>แก้ไข</a></td>";
            echo "<td><a href='delete.php?id=" . $row["id"] . "' onclick=\"return confirm('ยืนยันการลบข้อมูล !!');\">ลบ</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "ไม่มีสินค้า";
}

$conn->close();
?>
