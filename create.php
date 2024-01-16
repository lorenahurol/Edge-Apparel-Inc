<?php
include('include/head.php');
# If the request method of the form is POST, process it within the connect_db.php file
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   require('connect_db.php');

   # Initialise an error array - If the user doesn't input any data, show an error on the screen
   $errors = array();

   if (empty($_POST['item_name'])) { # Check if the superglobal $_POST is collecting form data.
      $errors[] = 'Enter the item name'; # Add message to the error array.
   } else {
      $n = mysqli_real_escape_string($link, trim($_POST['item_name']));
   } # $link is the database connection that $n should be associated with. 
   # Escape special characters and trim spaces. Store the result in variable $n

   if (empty($_POST['item_desc'])) {
      $errors[] = 'Enter the item description';
   } else {
      $d = mysqli_real_escape_string($link, trim($_POST['item_desc']));
   }

   if (empty($_POST['item_img'])) {
      $errors[] = 'Enter an item image';
   } else {
      $i = mysqli_real_escape_string($link, trim($_POST['item_img']));
   }

   if (empty($_POST['item_price'])) {
      $errors[] = 'Enter an item price';
   } else {
      $p = mysqli_real_escape_string($link, trim($_POST['item_price']));
   }

   # If the error array is empty (everything has been entered), process the data:
   if (empty($errors)) {
      $q = "INSERT INTO products (item_name, item_desc, item_img, item_price)
    VALUES ('$n', '$d', '$i', '$p')"; # Insert into products table, in each column, the values of each variable.
      # Create a new variable called row: creates a MySQL query
      $r = @mysqli_query($link, $q); # @ suppresses any error messages that might be generated if the query fails. 
      # mysqli_query runs a query to connect to the database ($link) and running $q.
      if ($r) {
         echo '<p>New record created successfully!</p>';
      }

   }

   if (!empty($errors)) {
      echo '<div class="error-messages">';
      foreach ($errors as $error) {
         echo '<p>' . $error . '</p>';
      }
      echo '</div>';
   }

   # Remember to close the database connection:

   mysqli_close($link);
}

?>

<!-- HTML form: -->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRUD Practice</title>
</head>

<body>
    <H1> Add an item </h1>
    <form action="create.php" method="post" enctype="multipart/form-data">
        <!-- Action: Where the data will be sent after submit.-->

        <label for="name">Item Name:</label>
        <input type="text" id="item_name" name="item_name" value="<?php if (isset($_POST['item_name']))
         echo $_POST['item_name']; ?> "> <br><br>
        <!--Name: name with the data will be sent to the server,
        value: initial value - checks whether the form has been set to send by POST.
        If it is, it populated the input field with the data from $_POST['item_name] -->

        <!--We can ommit the {} since there is only 1 statement inside the condition-->

        <label for="description">Description:</label>
        <textarea id="item_desc" name="item_desc"><?php if (isset($_POST['item_desc']))
         echo $_POST['item_desc']; ?></textarea> <br> <br>

        <label for="image">Image:</label>
        <input type="text" id="item_img" name="item_img" value="<?php if (isset($_POST['item_img']))
         echo $_POST['item_img']; ?>"> <br> <br>

        <label for="price">Price:</label>
        <input type="number" id="item_price" name="item_price" min="0" step="0.01" value="<?php if (isset($_POST['item_price']))
         echo $_POST['item_price']; ?>">

        <input type="submit" value="submit">

    </form>

    <!-- HTML links to be displayed on the page:-->
    </tr>
    </table></br><br><a href="create.php">Add Records</a> | <a href="read.php">Read Records</a> | <a
        href="update.php">Update Record</a> | <a href="delete.php">Delete Record</a>
</body>

</html>