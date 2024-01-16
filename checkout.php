<?php
include('include/head.php');
include('include/session.php');
# Display Checkout Page.

# Check for passed total and cart: If total >0 and cart is not empty
if (isset($_GET['total']) && ($_GET['total'] > 0) && (!empty($_SESSION['cart']))) {
    # Open database connection.
    require('connect_db.php');

    # Insert the user ID, order total, order date in 'orders' table.
    $q = "INSERT INTO orders ( user_id, total, order_date ) VALUES (" . $_SESSION['user_id'] . "," . $_GET['total'] . ", NOW() ) ";
    $r = mysqli_query($link, $q);

    # Retrieve current order number:
    $order_id = mysqli_insert_id($link);

    # Retrieve cart item id from 'products' database table:
    $q = "SELECT * FROM products WHERE item_id IN (";
    foreach ($_SESSION['cart'] as $id => $value) {
        $q .= $id . ',';
    }
    $q = substr($q, 0, -1) . ') ORDER BY item_id ASC';
    $r = mysqli_query($link, $q);

    # Store order contents in 'order_contents' database table: 
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $query = "INSERT INTO order_contents ( order_id, item_id, quantity, price )
    VALUES ( $order_id, " . $row['item_id'] . "," . $_SESSION['cart'][$row['item_id']]['quantity'] . "," . $_SESSION['cart'][$row['item_id']]['price'] . ")";
        $result = mysqli_query($link, $query);
    }

    # Close database connection: 
    mysqli_close($link);

    # Display order number:
    echo '<p style="padding: 40px;">Thanks for your order. <br> Your order number is #' . $order_id . '</p>';

    # If cart items > 0:
    $_SESSION['cart'] = NULL;
}

# If cart items = 0:
else {
    echo '<p>There are no items in your cart.</p>';
}

?>