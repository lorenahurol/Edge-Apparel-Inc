<!-- Create a PHP script that reads and displays all records stored in your database table.-->

<!doctype html>
<lang="en">

    <head>
        <title>CRUD Practice!</title>
    </head>

    <body>
        <?php
        # Retrieve data from the database table "products"
        # Connect to the database:
        require('connect_db.php');

        # Create a new query that EXTRACTS all columns from the products table:
        $q = "SELECT * FROM products;";
        # Create a new variable called $r, it executes the query $q (extracting data from products), using the connection $link.
        $r = @mysqli_query($link, $q);
        if (mysqli_num_rows($r) != 0) { # If the number of rows in $r is not 0, it will process each row.
            echo '<h1>Read Items</h1>
        <table class="table">
        <thead>
        <tr><th>Item ID</th><th>Item Name</th><th>Description</th><th>Image</th><th>Price</th></tr></thead><tbody>';

            # While loop: Fetch each row of the query result and assign it to the row variable.
            # For each $row, it performs the code inside the loop (puts it in a table), until there are no rows left.
            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) { #MySQL Improved Associative Array (type of array the function should return)
                echo '<tr>
            <td>' . $row['item_id'] . ' </td><td>' . $row['item_name'] . ' </td><td>' . $row['item_desc'] . '</td><td><img src="' . $row['item_img'] . '" alt="product" width="50"   height="50"></td><td>£' . $row['item_price'] . '</td>';
            }

            #HTML links to be displayed on the page:
            echo '</tr></table></br><br><a href="create.php">Add Records</a>  |  <a href="read.php">Read Records</a>  |  <a href="update.php">Update Record</a>  | <a href="delete.php">Delete Record</a>';
        }

        # Close the database connection
        mysqli_close($link);
        exit();

        ?>
    </body>

    </html>