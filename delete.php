<?php
# Connect to database:
require ('connect_db.php');

$q = "SELECT * FROM products";
$r = @mysqli_query($link, $q);

echo '<h1>Delete Item</h1>';
echo '<table class="table">';
echo '<thead><tr><th>ID</th><th>Item Name</th><th>Item Price</th><th>Delete</th></tr></thead>';

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    echo '<tr>';
    echo '<td>' . $row['item_id'] . '</td>';
    echo '<td>' . $row['item_name'] . '</td>';
    echo '<td>' . $row['item_price'] . '</td>';
    echo '<td><a href="delete_now.php?item_id=' . $row['item_id'] . '">Delete</a></td>';
    echo '</tr>';
}

echo '</table>';
echo '<br><br><a href="create.php">Add Records</a> | <a href="read.php">Read Records</a> | <a href="update.php">Update Record</a> | <a href="delete_now.php">Delete Record</a>';

# Close database:
mysqli_close($link);
exit();
?>
