<?php

class Hotels
{
    public $name;
    public $price;
    public $images;
    public $days;
    public $info;

    function __construct($name){
        $this->name = $name;
//        $this->price = $price;
    }

    public function setHotelName($name){
        if($name == 'bradsHotel')
        {
            $this->name = 'Brads Hotel';
            return $this->name;
        }
        elseif ($name == 'nicksHotel')
        {
            $this->name = 'Nicks Hotel';
            return $this->name;
        }
        elseif ($name == 'davidsHotel')
        {
            $this->name = 'Davids Hotel';
            return $this->name;
        }
        elseif ($name == 'ayrtonsHotel')
        {
            $this->name = 'Ayrtons Hotel';
            return $this->name;
        }
        else
        {
            $this->name = 'Rice Family Hotel';
            return $this->name;
        }

    }

    public function getHotelPrice($name)
    {
        if ($name == 'bradsHotel')
        {
            $this->price = 1000;
        }
        elseif ($name == 'nicksHotel')
        {
            $this->price = 925;
        }
        elseif ($name == 'davidsHotel')
        {
            $this->price = 950;
        }
        elseif($name == 'ayrtonsHotel')
        {
            $this->price = 850;
        }
        else
        {
            $this->price = 855;
        }
        return $this->price;
    }

    public function getHotelImages($name)
    {
        if ($name == 'bradsHotel')
        {
            $this->images = [
                'bradsHotel'=> ['../images/bradsHotel1stImage.jpg','../images/bradsHotel2ndImage.jpg'],
            ];
            return array($this->images);
        }
        elseif ($name == 'nicksHotel')
        {
            $this->images = [
                'nicksHotel'=>['../images/nicksHotel1.jpg','../images/nicksHotel2.jpg'],
            ];
            return array($this->images);
        }
        elseif ($name == 'davidsHotel')
        {
            $this->images = [
                'davidsHotel'=>['../images/davidsHotel1.jpg','../images/davidsHotel2.jpg'],
            ];
            return array($this->images);
        }
        elseif ($name == 'ayrtonsHotel')
        {
            $this->images = [
                'ayrtonsHotel'=>['../images/ayrtonsHotel1.jpg','../images/ayrtonsHotel2.jpg'],
            ];
            return array($this->images);
        }
        else
        {
            $this->images = [
                'riceFamilyHotel'=>['../images/riceFamilyHotel1.jpg','../images/riceFamilyHotel2.jpg']
            ];
            return array($this->images);
        }

    }

    public function getDays($days){
        $days = $_POST["numberOfDays"];
        $this->days = $days;
        return $this->days;
    }

    public function getInfo($name){
        if ($name == 'bradsHotel')
        {
            $this->info = array("2 Bedrooms","Wifi Included");
            return $this->info;
        }
        elseif ($name == 'nicksHotel')
        {
            $this->info = array("1 Bedroom","1 km From Beach");
            return $this->info;
        }
        elseif ($name == 'davidsHotel')
        {
            $this->info = array("Pet friendly","Secure Parking");
            return $this->info;
        }
        elseif ($name == 'ayrtonsHotel')
        {
            $this->info = array("24Hr Room service","Wifi Included");
            return $this->info;
        }
        else
        {
            $this->info = array("Self Catering","Wifi Included");
            return $this->info;
        }
    }

    public function getadditionalHotels($name){

        if($name == 'bradsHotel')
        {
            return array("hotel1" => "nicksHotel" , "hotel2" => "davidsHotel", "hotel3" => "ayrtonsHotel","hotel4" => "riceFamilyHotel");
        }
        elseif ($name == 'nicksHotel')
        {
            return array("hotel1" => "bradsHotel" , "hotel2" => "davidsHotel", "hotel3" => "ayrtonsHotel","hotel4" => "riceFamilyHotel");
        }
        elseif ($name == 'davidsHotel')
        {
            return array("hotel1" => "bradsHotel" , "hotel2" => "nicksHotel", "hotel3" => "ayrtonsHotel","hotel4" => "riceFamilyHotel");
        }
        elseif ($name == 'ayrtonsHotel')
        {
            return array("hotel1" => "bradsHotel" , "hotel2" => "nicksHotel", "hotel3" => "davidsHotel","hotel4" => "riceFamilyHotel");
        }
        else
        {
            return array("hotel1" => "bradsHotel" , "hotel2" => "nicksHotel", "hotel3" => "davidsHotel","hotel4" => "ayrtonsHotel");
        }


    }


}