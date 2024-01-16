<?php # Helper functions for login.
# Function to load specified or default URL (LOAD):
function load($page = 'login.php')
{
    # Construct the URL with protocol, domain and current directory:
    $url = 'https://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

    # Remove trailing slashes then append page name to URL:
    $url = rtrim($url, '/\\') . '/' . $page;

    # Execute redirect then quit:
    header("Location: $url"); // Use double quotes to parse the variable correctly
    exit();
}


# Function to check email address and password (VALIDATE):
function validate($link, $email = '', $pass = '')
{
    # Initialise error array:
    $errors = array();

    # Check email field:
    if (empty($email)) {
        $errors[] = 'Enter your email';
    } else {
        $e = mysqli_real_escape_string($link, trim($email));
    }

    # Check password field:
    if (empty($pass)) {
        $errors[] = 'Enter your password';
    } else {
        $p = mysqli_real_escape_string($link, trim($pass));
    }


    # On success retrieve the user_id, first_name, last_name from 'users' database:
    if (empty($errors)) {
        $q = "SELECT user_id, first_name, last_name FROM users WHERE email='$e' AND pass=SHA2('$p', 256)";
        $r = mysqli_query($link, $q);


        if (mysqli_num_rows($r) == 1) {
            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
            return array(true, $row);
        } else {
            # Or on failure set error message:
            $errors[] = 'Email address and password not found';
        }
    }
    # On failure retrieve error messages:
    return array(false, $errors);

}




?>