<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edge Apparel Inc. Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
    .login-button {
        margin-top: 20px;
    }

    body {
        font-weight: 500;
    }

    ::placeholder {
        font-weight: 600;
    }

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
    ?>

    <header>
        <h1>Login</h1>
    </header>

    <form action="login_action.php" method="post">
        <?php
        if (isset($errors) && !empty($errors)) {
            echo '<div class="alert alert-danger mt-3" role="alert">';
            echo '<h4 class="alert-heading">Oops! There was a problem:</h4>';
            foreach ($errors as $msg) {
                echo "<p>$msg</p>";
            }
            echo '<p>Please try again or <a class="alert-link" href="register.php">Register</a></p>';
            echo '</div>';
        }
        ?>

        <div class="form-group">
            <label for="inputemail">Email</label>
            <input type="text" name="email" class="form-control" required placeholder="Enter Email *">
        </div>
        <br>
        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" name="pass" class="form-control" required placeholder="Enter Password *">
        </div>
        <div class="text-center">
            <input type="submit" class="btn btn-dark btn-lg btn-block login-button" value="Login">
        </div>
    </form>

    <?php
    # Include the footer
    include('include/footer.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
</body>

</html>