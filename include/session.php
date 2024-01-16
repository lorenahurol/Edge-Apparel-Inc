<?php
# Access session.
session_start();
# Redirect if not logged in.
if (!isset($_SESSION['user_id'])) {
    require('login_tools.php');
    load();
}

echo '<h1 class="mb-4 px-4">' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . "'s basket</h1>";


?>