<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
}

include_once "../lib/DB.php";

use PO\Lib\DB;

$db = new DB("localhost", 3306, "root", "", "project");

if(isset($_POST['submit'])) {
    $insert = $db->insertItem($_POST['category'], $_POST['filtercat'], $_POST['price'], $_POST['address'], $_POST['bedrooms'], $_POST['bathrooms'], $_POST['area'], $_POST['floor'], $_POST['parking'], $_POST['img'], $_POST['url']);

    if($insert) {
        header("Location: home.php?status=1");
    } else {
        header("Location: home.php?status=2");
    }
} else {
    header("Location: home.php");
}