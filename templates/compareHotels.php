<?php
include "../routes/compare.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>
<body class="compareHotelsBody">
    <nav></nav>
    <section class="compareHotelsContainer">
        <div class="cardsContainer">
            <div class="leftCard">
                <div class="leftHotelCard hotelCard" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php
                            $additionalHotel = getClosestPriceHotelsHighToLow();
                            $hotel1 = array_slice($additionalHotel, 0, 1, true);
                            $hotelName = array_keys($hotel1);
                            $name = $hotelName[0];
                            $hotel = new Hotels($name);
                            $secondHotel = $hotel->setHotelName($name);
                            echo $secondHotel;
                        ?></h5>
                        <div class="selectedHotelInfoContainer">
                            <div class="selectedHotelInfoLeft">
                                <ul>
                                    <li>
                                        <?php
                                        $additionalHotelPrice = getClosestPriceHotelsHighToLow();
                                        $additionalHotel1PriceName = array_slice($additionalHotelPrice, 0, 1, true);
                                        $additionalHotel1Name = array_keys($additionalHotel1PriceName);
                                        $additionalHotel1 = $additionalHotel1Name[0];
                                        $hotel = new Hotels($additionalHotel1);
                                        $price = $hotel->getHotelPrice($additionalHotel1) * $_GET['days'];
                                        echo $price;
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="selectedHotelInfoRight">
                                <ul>
                                    <li>
                                        <?php

                                        ?>
                                    </li>
                                    <li>
                                        <?php

                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p class="card-text">Some text</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="middleCard">
                <div class="middleHotelCard hotelCard" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo getSelectedHotel(); ?></h5>
                        <div class="selectedHotelInfoContainer">
                            <div class="selectedHotelInfoLeft">
                                <ul>
                                    <li>
                                        <?php
                                        $selectedHotelPrice = getSelectedHotelPrice();
                                        echo "R".$selectedHotelPrice;
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="selectedHotelInfoRight">
                                <ul>
                                    <li>
                                        <?php
                                        $name = getSelectedHotel();
                                        $selectedHotelInfo = new Hotels($name);
                                        $info = $selectedHotelInfo->getInfo($_GET['hotel']);
                                        echo "$info[0]";
                                        ?>
                                    </li>
                                    <li>
                                        <?php
                                        $selectedHotelName = getSelectedHotel();
                                        $selectedHotelInfo = new Hotels($selectedHotelName);
                                        $info = $selectedHotelInfo->getInfo($_GET['hotel']);
                                        echo $info[1];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <p class="card-text">Some text</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="rightCard">
                <div class="rightHotelCard hotelCard" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php
                            $additionalHotel = getClosestPriceHotelsHighToLow();
                            $hotel2 = array_slice($additionalHotel, -1, 1, true);
                            $hotelName = array_keys($hotel2);
                            $name = $hotelName[0];
                            $hotel = new Hotels($name);
                            $thirdHotel = $hotel->setHotelName($name);
                            echo $thirdHotel;
                            ?></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="filterContainer">
            <label for="filters" class="form-label hotelFilters">Filters:</label>
            <br>
            <select name="filters" id="filters" class="form-select">
                <option value="" selected disabled>Select a filter</option>
                <option value="volvo">Close too beach</option>
                <option value="saab">Pet Friendly</option>
                <option value="mercedes">Wifi Included</option>
                <option value="audi">Parking</option>
                <option value="audi">1 Bedroom</option>
                <option value="audi">2 Bedrooms</option>
                <option value="audi">Self Catering</option>
            </select>
        </div>
    </section>
</body>
</html>
<script>
    $(".leftCard").click(function (){
        var firstElement = $('.leftHotelCard').detach();
        var secondElement = $('.middleHotelCard').detach();
        $('.middleCard').append(firstElement);
        firstElement.removeClass('leftHotelCard').addClass('middleHotelCard');
        $('.leftCard').append(secondElement);
        secondElement.removeClass('middleHotelCard').addClass('leftHotelCard');
    })

    $(".rightCard").click(function (){
        var firstElement = $('.rightHotelCard').detach();
        var secondElement = $('.middleHotelCard').detach();
        $('.middleCard').append(firstElement);
        firstElement.removeClass('rightHotelCard').addClass('middleHotelCard');
        $('.rightCard').append(secondElement);
        secondElement.removeClass('middleHotelCard').addClass('rightHotelCard');
    })




</script>