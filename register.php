<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edge Apparel Inc. Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
    header {
        padding: 20px;
    }

    form {
        padding: 40px;
    }
    </style>
</head>

<body>
    <?php
    include('include/head.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        # 1. Connect to the database:
        require('connect_db.php');

        # 2. Initialize an error array:
        $errors = array();

        # 3. Check for the values:
        # First name:
        if (empty($_POST['first_name'])) {
            $errors[] = 'Enter your first name';
        } else {
            $fn = mysqli_real_escape_string($link, trim($_POST['first_name']));
        }

        # Last name:
        if (empty($_POST['last_name'])) {
            $errors[] = 'Enter your last name';
        } else {
            $ln = mysqli_real_escape_string($link, trim($_POST['last_name']));
        }

        # Email:
        if (empty($_POST['email'])) {
            $errors[] = 'Enter your email address';
        } else {
            $e = mysqli_real_escape_string($link, trim($_POST['email']));
        }

        # Check for a password and matching input passwords:
        if (!empty($_POST['pass1']) && !empty($_POST['pass2'])) {
            if ($_POST['pass1'] != $_POST['pass2']) {
                $errors[] = 'Passwords do not match';
            } else {
                $p = mysqli_real_escape_string($link, trim($_POST['pass1']));
            }
        } else {
            $errors[] = 'Enter and confirm your password';
        }


        # Checking if the email address has already been registered in the database:
        if (empty($errors)) { # If there are no errors
            $q = "SELECT user_id FROM users WHERE email='$e'";
            $r = mysqli_query($link, $q);
            if (mysqli_num_rows($r) != 0) {
                $errors[] = 'Email address already registered. <a class="alert-link" href="login.php">Login</a> Or please try again';
            }
        }

        # On success, register user by inserting into 'users' database table:
        if (empty($errors)) {
            $q = "INSERT INTO users (first_name, last_name, email, pass, reg_date)
    VALUES ('$fn', '$ln', '$e', SHA2('$p', 256), NOW())"; # Enter into each column on the table users, the values of the variables.
    
            $r = mysqli_query($link, $q);
            if ($r) {
                echo '<div class="alert alert-success" role="alert">';
                echo '<h4 class="alert-heading">Registered!</h4>';
                echo '<p>You are now registered.</p>';
                echo '<a class="alert-link" href="login.php">Login</a>';
                echo '</div>';
            }

            # Close database connection:
            mysqli_close($link);

            exit();

        } else # Or report errors 
        {
            echo '<div class="alert alert-danger" role="alert">';
            echo '<h4 class="alert-heading" id="err_msg">The following error(s) occurred:</h4>';

            // Only display the "Email address already registered. Login Or please try again" message
            echo 'Email address already registered. <br> <a class="alert-link" href="login.php">Login</a> <br> Or please try again</div>';
        }
    }
    ?>

    <header>
        <h1>Create Account</h1>
    </header>

    <form action="register.php" method="POST">

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="inputfirst_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" placeholder="First Name *" value="<?php if (isset($_POST['first_name']))
                        echo $_POST['first_name']; ?>">
                </div>
                <!--Closing form group-->
            </div>
            <!--Closing col-->

            <div class="col">
                <div class="form-group">
                    <label for="inputlast_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name *" value="<?php if (isset($_POST["last_name"]))
                        echo $_POST["last_name"]; ?>">
                </div>
                <!--Closing form group-->
            </div>
            <!--Closing col-->
        </div>
        <!--Closing row-->

        <div class="form-group">
            <label for="inputemail">Email</label>
            <input type="email" name="email" class="form-control" placeholder="email@example.com" value="<?php if (isset($_POST["email"]))
                echo $_POST["email"]; ?>">
        </div>
        <!--Closing form-group-->
        <small id="emailHelp" class="form-text text-muted">*We'll never share your email with anyone else.</small>
        <br>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="inputpass1">Create New Password</label>
                    <input type="password" name="pass1" class="form-control" placeholder="Create New Password *" value="<?php if (isset($_POST["pass1"]))
                        echo $_POST["pass1"]; ?>">
                </div>
                <!--Closing form-group-->
            </div>
            <!--Closing col-->

            <div class="col">
                <div class="form-group">
                    <label for="inputpass2">Confirm New Password</label>
                    <input type="password" name="pass2" class="form-control" placeholder="Confirm Password *" value="<?php if (isset($_POST["pass2"]))
                        echo $_POST["pass2"]; ?>">
                </div>
                <!--Closing form-group-->
            </div>
            <!--Closing col-->
        </div>
        <!--Closing row-->
        <hr>
        <p>By creating an account you agree to our <a href="#">Terms & Privacy </a></p>
        <div class="text-center">
            <input type="submit" class="btn btn-dark btn-lg btn-block" value="Create Account">
        </div>
    </form>
</body>

<?php
# Include the footer
include('include/footer.php');
?>

</html>