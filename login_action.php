<?php #PROCESS LOGIN ATTEMPT
# Check the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Open database connection:
    require('connect_db.php');
    # Get connection, load and validate functions:
    require('login_tools.php');
    # Check login:
    # Validate function - Check the provided email and pass exist in the database.
    # List - Assign values (email, pass) to multiple variables ($check, $data) in a single operation.
    list($check, $data) = validate($link, $_POST['email'], $_POST['pass']);
    # $check: Contains a boolean value (true if validation succeeded, false otherwise).
    # $data: Contains additional user-related data if the validation was successful.

    # On success set session data and display logged in page.
    if ($check) {
        # Create a session:
        session_start();
        $_SESSION['user_id'] = $data['user_id']; # The session is an array needing user_id, first_name and last_name
        $_SESSION['first_name'] = $data['first_name'];
        $_SESSION['last_name'] = $data['last_name'];
        load('home.php'); # If everything is ok it will load a homepage
    }

    # Or on failure, set errors:
    else {
        $errors = $data;
    }

    # Close database connection:
    mysqli_close($link);

}

# On failure, continue to display login.
include('login.php');
?>