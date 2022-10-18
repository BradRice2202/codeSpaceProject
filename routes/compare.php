<?php
include "../app/Hotels.php";


function getClosestPriceHotelsHighToLow(){
    $name = $_GET['hotel'];
    $days = $_GET['days'];

    $selectedHotel = new Hotels($name);

    $additionalHotels = $selectedHotel->getadditionalHotels($name);

    $hotels = $additionalHotels;

    $hotelPrices = array();

    foreach ($hotels as $hotel => $hotelName){
        $allHotelNames = new Hotels($hotelName);
        $hotelPrices[] = [$allHotelNames->name => $allHotelNames->getHotelPrice($hotelName) * $days];
    }

    $hotelPricesDesc = array_reduce($hotelPrices, 'array_merge', array());

    arsort($hotelPricesDesc);

    $closestPricesHighToLow = array_slice($hotelPricesDesc, 0 , 2);


    return $closestPricesHighToLow;
}

function getClosestHotelsLowToHigh(){
    $name = $_GET['hotel'];
    $days = $_GET['days'];

    $selectedHotel = new Hotels($name);


    $additionalHotels = $selectedHotel->getadditionalHotels($name);

    $hotels = $additionalHotels;

    $hotelPrices = array();

    foreach ($hotels as $hotel => $hotelName){
        $allHotelNames = new Hotels($hotelName);
        $hotelPrices[] = [$allHotelNames->name => $allHotelNames->getHotelPrice($hotelName) * $days];
    }

    $hotelPricesAsc = array_reduce($hotelPrices, 'array_merge', array());

    asort($hotelPricesAsc);

    $pricesLowToHigh = array_slice($hotelPricesAsc, 0, 2);

    return $pricesLowToHigh;

}


function getSelectedHotel(){
    $name = $_GET['hotel'];

    $selectedHotel = new Hotels($name);

    $selectedHotelName = $selectedHotel->setHotelName($name);


    return $selectedHotelName;
}


function getSelectedHotelPrice(){
    $name = $_GET['hotel'];
    $days = $_GET['days'];

    $selectedHotel = new Hotels($name);

    $selectedHotelPrice = $selectedHotel->getHotelPrice($name) * $days;

    return $selectedHotelPrice;
}

getSelectedHotelPrice();


//header("Location: ../templates/compareHotels.php");
//exit();