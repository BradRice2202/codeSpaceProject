<?php

include "../app/Hotels.php";
include "../templates/home.html";
//include "../images";

//print_r($_POST);
//exit;

$hotel = new Hotels($_POST['hotelName']);
$hotel->name = $hotel->setHotelName($_POST['hotelName']);
$hotel->price = $hotel->getHotelPrice($_POST['hotelName']) * $_POST["numberOfDays"];
$hotel->images = $hotel->getHotelImages($_POST['hotelName']);
$hotel->days = $hotel->getDays($_POST['numberOfDays']);
$hotel->info = $hotel->getInfo($_POST['hotelName']);


$_SESSION['userFname'] = $_POST['firstName'];

header("../templates/home.html");
