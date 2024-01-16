<?php
# Add session
include('include/head.php');
include('include/session.php');
# Checks if the id parameter is present in the url and assigns it to the variable 'id'
if (isset($_GET['id'])) # 'id' is a parameter named id in the url, for example: example.com/page.php?id=123
    $id = $_GET['id']; # example: $id is 123.
# Open database connection:
require('connect_db.php');

# Retrieve selective item data from 'products' table:
$q = "SELECT * FROM products WHERE item_id = $id"; # SQL query: selects all the columns from 'products' table where item_id = $id. Retrieve data associated to that product id.
$r = mysqli_query($link, $q); # Executes the query on database with $link connection. The result is stored in $r.
if (mysqli_num_rows($r) == 1) { # Checks how many rows where returned by the query. If exactly 1: true
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC); # Fetches the first row of the result. Assigns it to $row. MYSQLI_ASSOC - The fetched array will have column name as associative keys.


    # Check if the cart in your session already contains one of this product id:

    if (isset($_SESSION['cart'][$id])) { # Session variable named 'cart'. Within 'cart' items are stored with their ids.
        # If the product is in the cart. Add one more of this product (quantity increase by 1)
        echo '<div style="padding: 40px;">';
        $_SESSION['cart'][$id]['quantity']++; # If the product with the id exists in the session's cart, quanitity is increased by 1.
        echo '<p>Another ' . $row["item_name"] . ' has been added to your cart</p> <a href="home.php">Continue Shopping</a> ¦ <a href="cart.php">View Your Cart</a>'; # Output message, with item_name from $row.
        echo '</div>';
    } else { # If product is not in the cart, add it to cart (quantity of 1)
        $_SESSION['cart'][$id] = array('quantity' => 1, 'price' => $row['item_price']); # New array: quantity 1, price recovered from item_price
        echo '<div style="padding: 40px;">';
        echo '<p> A ' . $row["item_name"] . ' has been added to your cart</p><a href="home.php">Continue Shopping</a> ¦ <a href="cart.php">View Your Cart</a>';
        echo '</div>';
    }
}

# Close database connection:
mysqli_close($link);

?>