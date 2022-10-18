<?php

include "../app/Hotels.php";
include "../templates/home.php";


$hotel = new Hotels($_POST['hotelName']);
$hotel->name = $hotel->setHotelName($_POST['hotelName']);
$hotel->price = $hotel->getHotelPrice($_POST['hotelName']) * $_POST["numberOfDays"];
$hotel->images = $hotel->getHotelImages($_POST['hotelName']);
$hotel->days = $hotel->getDays($_POST['numberOfDays']);
$hotel->info = $hotel->getInfo($_POST['hotelName']);


//$_SESSION['userFname'] = $_POST['firstName'];
//$_SESSION['userLname'] = $_POST['lastName'];
//$_SESSION['selectedHotel'] = $_POST['hotelName'];
//$_SESSION['days'] = $_POST['numberOfDays'];
//$_SESSION['totalPrice'] = $hotel->getHotelPrice($_POST['hotelName']) * $_POST["numberOfDays"];
//$_SESSION['hotelInfo'] = $hotel->getInfo($_POST['hotelName']);


//header("Location: ../templates/home.php");