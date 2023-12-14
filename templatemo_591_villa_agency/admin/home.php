<?php

use PO\Lib\DB;

session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
}
require_once '../lib/DB.php';

$dbInstance = new DB();

$realEstateItems = $dbInstance->getItems();

if(isset($_GET['status'])) {
    if($_GET['status'] == 1) {
        echo "<div id='alert' class='alert alert-success'>Úspešne vložená položka</div>";
    } elseif ($_GET['status'] == 2) {
        echo "<div id='alert' class='alert alert-danger'>Položka sa nevložila</div>";
    } elseif ($_GET['status'] == 3) {
        echo "<div id='alert' class='alert alert-success'>Úspešne vymazaná položka</div>";
    } elseif ($_GET['status'] == 4) {
        echo "<div id='alert' class='alert alert-danger'>Položka sa nezmazala</div>";
    } elseif ($_GET['status'] == 5) {
        echo "<div id='alert' class='alert alert-success'>Úspešne aktualizovaná položka</div>";
    } elseif ($_GET['status'] == 6) {
        echo "<div id='alert' class='alert alert-danger'>Položka sa neaktualizovala</div>";
    }
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
    </script>
</head>

<div class="properties"  style="padding-top: 50px;">
    <div class="container">
        <div class="top-icons logout"><a href="logout.php" class="logout-icon"><i class="fa-solid fa-right-from-bracket" title="Odhlásiť"></i></a></div>

        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <div class="section-heading text-center">
                    <div class="top-icons">
                        <a href="#insertForm" class="plus-icon"><i class="fa-regular fa-square-plus" title="Pridať záznam"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($realEstateItems as $item): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="item">
                        <a href="<?php echo htmlspecialchars($item['url']); ?>">
                            <img src="../<?php echo $item['img']; ?>" alt="Property Image">
                        </a>
                        <span class="category"><?php echo $item['category']; ?></span>
                        <h6>$<?php echo $item['price']; ?></h6>
                        <h4>
                            <a href="<?php echo $item['url']; ?>"><?php echo $item['address']; ?></a>
                        </h4>
                        <ul>
                            <li>
                                Bedrooms: <span><?php echo $item['bedrooms']; ?></span>
                            </li>
                            <li>
                                Bathrooms: <span><?php echo $item['bathrooms']; ?></span>
                            </li>
                            <li>
                                Area: <span><?php echo $item['area']; ?>m2</span>
                            </li>
                            <li>
                                Floor: <span><?php echo $item['floor']; ?></span>
                            </li>
                            <li>
                                Parking: <span><?php echo $item['parking']; ?> spots</span>
                            </li>
                            <li style="width: 100%">
                                <i style="opacity: 0.65;">Filter: <span><?php
                                        switch ($item['filtercat']) {
                                            case 'adv':
                                                echo 'Apartman';
                                                break;
                                            case 'str':
                                                echo 'Villa House';
                                                break;
                                            case 'rac':
                                                echo 'Penthouse';
                                                break;
                                        }
                                        ?></span></i>
                            </li>
                        </ul>
                        <ul class="admin-icon">
                            <li>
                                <a href='delete.php?id=<?php echo $item['id']; ?>'><i class="fa-solid fa-trash" title="Zmazať"></i></a>
                            </li>
                            <li>
                                <a href='edit.php?id=<?php echo $item['id']; ?>'><i class="fa-solid fa-pen-to-square" title="Upraviť"></i></a></li>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<div class="contact-page section" id="insertForm">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <form id="contact-form" action="insert-item.php" method="post">
                    <input type="hidden" name="id" value="">
                    <div class="row">
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="category">Category</label>
                                <input type="text" required="required" name="category" value="" placeholder="Category"><br>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="filtercat">Filter<!-- <span style="color: #1e1e1e; opacity: 0.65;">(Apartment-adv, Villa-str, Penthouse-rac)</span>--></label>
                                <!--<input type="text" required="required" name="filtercat" value="" placeholder="Filter"><br>-->
                                <select name="filtercat">
                                    <option value="adv">Apartment</option>
                                    <option value="str">Villa</option>
                                    <option value="rac">Penthouse</option>
                                </select>
                            </fieldset><br>
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
<script type="text/javascript">
    setTimeout(function () {

        // alert
        $('#alert').alert('close');
    }, 3000);
</script>
</html>