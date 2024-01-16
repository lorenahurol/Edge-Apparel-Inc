<?php
require('connect_db.php');
include('include/head.php');
session_start();
?>

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

    <!-- Hero section -->
    <div class="section">
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="img/hero-img.jpg" class="d-block mx-lg-auto img-fluid rounded-2" alt="Bootstrap Themes"
                        width="450" height="250">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Where Fashion Meets Attitude</h1>
                    <p class="lead">At EdgeApparel, we believe that clothing is more than just fabric. It is a
                        statement, an
                        expression of your unique personality and style. Our curated collections are designed to bring
                        out
                        the edginess in every individual, offering a fusion of street-inspired trends and timeless
                        classics.
                    </p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a href="#new-arrivals" class="btn btn-info btn-lg px-4 me-md-2">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Arrivals section -->
    <div class="container mt-2 py-3" id="new-arrivals">
        <h2>New Arrivals</h2>
        <hr>
        <p>Discover the latest trends and styles with our New Arrivals collection.</p>
        <?php
        $q = "SELECT * FROM products";
        $r = mysqli_query($link, $q);
        if (mysqli_num_rows($r) > 0) {
            # Display body section:
            echo ' <div class="container mx-auto">';
            $counter = 0;
            while (($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) && ($counter < 9)) {
                if ($counter % 3 === 0) {
                    echo '<div class="row justify-content-center mt-5 px-3">';
                }
                echo '<div class="col-sm-12 col-md-4 col-lg-4 mb-4 text-center">
                <div class="card" style="width: 18rem; height:100%;">
                    <img src="' . $row['item_img'] . '" class="card-img-top img-fluid" alt="' . $row['item_name'] . '">
                    <div class="card-body">
                        <h5 class="card-title">' . $row['item_name'] . '</h5>
                        <h4 class="card-text">' . $row['item_desc'] . '</p>
                        <p class="card-text">£ ' . $row['item_price'] . '</p>
                        <a href="added.php?id=' . $row['item_id'] . '" class="btn btn-light">Buy Now</a>
                        </div>
                    </div>
                </div>';
                $counter++;
                if ($counter % 3 === 0) {
                    echo '</div>';
                }
            }
            echo '</div>';

            # Close database connection:
        
            mysqli_close($link);
        }

        # Or display message:
        else {
            echo '<p>There are currently no items in the table to display.</p>';
        }

        ?>

    </div>

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