<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
}

include_once "../lib/DB.php";

use PO\Lib\DB;

$db = new DB("localhost", 3306, "root", "", "project");

if(!isset($_GET['id'])) {
    header("Location: home.php");
}

$item = $db->getItem($_GET['id']);
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
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
</head>
<body>

<div class="contact-page section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <form id="contact-form" action="edit-item.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="category">Category</label>
                                <input type="text" required="required" name="category" value="<?php echo $item['category']; ?>" placeholder="Category"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="filtercat">Filter</label>
                                <input type="text" required="required" name="filtercat" value="<?php echo $item['filtercat']; ?>" placeholder="Filter"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="price">Price</label>
                                <input type="number" required="required" min="1" name="price" value="<?php echo $item['price']; ?>" placeholder="Price"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="address">Address</label>
                                <input type="text" required="required" name="address" value="<?php echo $item['address']; ?>" placeholder="Address"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="bedrooms">Bedrooms</label>
                                <input type="number" required="required" min="1" name="bedrooms" value="<?php echo $item['bedrooms']; ?>" placeholder="Bedrooms"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="bathrooms">Bathrooms</label>
                                <input type="number" required="required" min="1" name="bathrooms" value="<?php echo $item['bathrooms']; ?>" placeholder="Bathrooms"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="area">Area</label>
                                <input type="number" required="required" min="1" name="area" value="<?php echo $item['area']; ?>" placeholder="Area"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="floor">Floor</label>
                                <input type="number" required="required" min="0" name="floor" value="<?php echo $item['floor']; ?>" placeholder="Floor"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="parking">Parking</label>
                                <input type="number" required="required" min="0" name="parking" value="<?php echo $item['parking']; ?>" placeholder="Parking"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="img">Img source</label>
                                <input type="text" required="required" name="img" value="<?php echo $item['img']; ?>" placeholder="Img source"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="url">URL address</label>
                                <input type="text" required="required" name="url" value="<?php echo $item['url']; ?>" placeholder="URL address"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <input type="submit" name="submit" class="orange-button" value="Aktualizovať">
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</body>

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