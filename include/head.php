<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edge Apparel Inc. Online Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">



</head>

<body>

    <!--Navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3 d-block d-sm-block d-md-block">
        <!--Added responsiveness with display block for medium, small and sx screens-->
        <div class="container">

            <a class="navbar-brand" href="home.php">edgeapparel</a>
            <!--img src=-->

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span><i id="bars" class="fa fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto">
                    <!--Moving nav bar links to the right-->
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Create Account</a>
                        <!--Create Account-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Log In</a>
                        <!--Log In-->
                    </li>
                    <li class="nav-item">
                        <a href="cart.php">
                            <i class="fa fa-shopping-cart"></i>
                            <!--Shopping Cart-->
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
</body>

</html>