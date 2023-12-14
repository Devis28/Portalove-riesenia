<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Villa Agency - Real Estate HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
</head>
<body>

<div class="contact-page section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <form id="contact-form" action="insert-item.php" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="category">Category</label>
                                <input type="text" required="required" name="category" value="" placeholder="Category"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="filtercat">Price</label>
                                <input type="text" required="required" name="filtercat" value="" placeholder="Filter"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="price">Price</label>
                                <input type="number" required="required" min="1" name="price" value="" placeholder="Price"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="address">Address</label>
                                <input type="text" required="required" name="address" value="" placeholder="Address"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="bedrooms">Bedrooms</label>
                                <input type="number" required="required" min="1" name="bedrooms" value="" placeholder="Bedrooms"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="bathrooms">Bathrooms</label>
                                <input type="number" required="required" min="1" name="bathrooms" value="" placeholder="Bathrooms"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="area">Area</label>
                                <input type="number" required="required" min="1" name="area" value="" placeholder="Area"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="floor">Floor</label>
                                <input type="number" required="required" min="0" name="floor" value="" placeholder="Floor"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="parking">Parking</label>
                                <input type="number" required="required" min="0" name="parking" value="" placeholder="Parking"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="img">Img source</label>
                                <input type="text" required="required" name="img" value="" placeholder="Img source"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="url">URL address</label>
                                <input type="text" required="required" name="url" value="" placeholder="URL address"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <input type="submit" name="submit" class="orange-button" value="Pridať">
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include_once "../parts/footer.php";
?>

<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/isotope.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/counter.js"></script>
<script src="assets/js/custom.js"></script>
</html>