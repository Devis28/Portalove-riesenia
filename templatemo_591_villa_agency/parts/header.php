<?php
include_once "lib/DB.php";

use PO\Lib\DB;

$db = new DB("localhost", 3306, "root", "", "project");
$currentUrl = $_SERVER['REQUEST_URI'];
?>

<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                        <h1>Villa</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <?php
                        $menu = $db->getMenuItems();
                        foreach ($menu as $menuName => $menuUrl) {
                            $class = ($menuUrl == $currentUrl) ? 'class="current"' : '';
                            echo '<li><a href="'.$menuUrl.'" '.$class.'>'.$menuName.'</a></li>';
                        }
                        ?>
                        <li><a href="#"><i class="fa fa-calendar"></i> Schedule a visit</a></li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>