<?php
include "../routes/compare.php";
session_start();
//echo"<pre>";
//print_r($_SESSION);
//exit;

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
        <div class="priceSelectorContainer">
            <div class="priceSelector">
                <label for="pricesFilter" class="form-label pricesFilterLabel">Price Filter:</label>
                <br>
                <select name="pricesFilter" id="pricesFilter" class="form-select" onchange="location = this.value;">
                    <option value="" selected disabled>Select a filter</option>
                    <?php
                        $hotel = $_GET['hotel'];
                        $days = $_GET['days'];
                        $price = 'high';
                        echo'<option value="compareHotels.php?hotel=' . $hotel . '&days=' . $days . '&price=' . $price . ' ">High</option>'
                    ?>
                    <?php
                    $hotel = $_GET['hotel'];
                    $days = $_GET['days'];
                    $price = 'low';
                    echo'<option value="compareHotels.php?hotel=' . $hotel . '&days=' . $days . '&price=' . $price . ' ">Low</option>'
                    ?>
                </select>
            </div>
        </div>
        <div class="cardsContainer">
            <div class="leftCard">
                <div class="leftHotelCard hotelCard" style="width: 18rem;">
                    <div class="row">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <?php
                                        if($_GET['price'] == 'high')
                                        {
                                            $additionalHotel = getClosestPriceHotelsHighToLow();
                                            $hotel1 = array_slice($additionalHotel, 0, 1, true);
                                            $hotelName = array_keys($hotel1);
                                            $name = $hotelName[0];
                                            $hotel = new Hotels($name);
                                            $image1 = $hotel->getHotelImages($name);
                                            $image1 = $image1[0]["$name"][0];
                                            echo"<img src='$image1'class='d-block w-100 card-img-top compareHotelImage' alt='...'>";
                                        }
                                        elseif ($_GET['price'] == 'low')
                                        {
                                            $additionalHotel = getClosestHotelsLowToHigh();
                                            $hotel1 = array_slice($additionalHotel, 0, 1, true);
                                            $hotelName = array_keys($hotel1);
                                            $name = $hotelName[0];
                                            $hotel = new Hotels($name);
                                            $image1 = $hotel->getHotelImages($name);
                                            $image1 = $image1[0]["$name"][0];
                                            echo"<img src='$image1'class='d-block w-100 card-img-top compareHotelImage' alt='...'>";
                                        }
                                    ?>
                                </div>
                                <div class="carousel-item">
                                    <?php
                                        if($_GET['price'] == 'high')
                                        {
                                            $additionalHotel = getClosestPriceHotelsHighToLow();
                                            $hotel1 = array_slice($additionalHotel, 0, 1, true);
                                            $hotelName = array_keys($hotel1);
                                            $name = $hotelName[0];
                                            $hotel = new Hotels($name);
                                            $image2 = $hotel->getHotelImages($name);
                                            $image2 = $image2[0]["$name"][1];
                                            echo"<img src='$image2'class='d-block w-100 card-img-top compareHotelImage' alt='...'>";
                                        }
                                        elseif ($_GET['price'] == 'low')
                                        {
                                            $additionalHotel = getClosestHotelsLowToHigh();
                                            $hotel1 = array_slice($additionalHotel, 0, 1, true);
                                            $hotelName = array_keys($hotel1);
                                            $name = $hotelName[0];
                                            $hotel = new Hotels($name);
                                            $image2 = $hotel->getHotelImages($name);
                                            $image2 = $image2[0]["$name"][1];
                                            echo"<img src='$image2'class='d-block w-100 card-img-top compareHotelImage' alt='...'>";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php
                                if($_GET['price'] == 'high')
                                {
                                    $additionalHotel = getClosestPriceHotelsHighToLow();
                                    $hotel1 = array_slice($additionalHotel, 0, 1, true);
                                    $hotelName = array_keys($hotel1);
                                    $name = $hotelName[0];
                                    $hotel = new Hotels($name);
                                    $secondHotel = $hotel->setHotelName($name);
                                    echo $secondHotel;
                                }
                                elseif ($_GET['price'] == 'low')
                                {
                                    $additionalHotel = getClosestHotelsLowToHigh();
                                    $hotel1 = array_slice($additionalHotel, 0, 1, true);
                                    $hotelName = array_keys($hotel1);
                                    $name = $hotelName[0];
                                    $hotel = new Hotels($name);
                                    $secondHotel = $hotel->setHotelName($name);
                                    echo $secondHotel;
                                }

                            ?>
                        </h5>
                        <div class="selectedHotelInfoContainer">
                            <div class="selectedHotelInfoLeft">
                                <ul>
                                    <li>
                                        <?php
                                            if($_GET['price'] == 'high')
                                            {
                                                $additionalHotelPrice = getClosestPriceHotelsHighToLow();
                                                $additionalHotel1PriceName = array_slice($additionalHotelPrice, 0, 1, true);
                                                $additionalHotel1Name = array_keys($additionalHotel1PriceName);
                                                $additionalHotel1 = $additionalHotel1Name[0];
                                                $hotel = new Hotels($additionalHotel1);
                                                $price = $hotel->getHotelPrice($additionalHotel1) * $_GET['days'];
                                                echo "R".$price;
                                            }
                                            elseif ($_GET['price'] == 'low')
                                            {
                                                $additionalHotelPrice = getClosestHotelsLowToHigh();
                                                $additionalHotel1PriceName = array_slice($additionalHotelPrice, 0, 1, true);
                                                $additionalHotel1Name = array_keys($additionalHotel1PriceName);
                                                $additionalHotel1 = $additionalHotel1Name[0];
                                                $hotel = new Hotels($additionalHotel1);
                                                $price = $hotel->getHotelPrice($additionalHotel1) * $_GET['days'];
                                                echo "R".$price;
                                            }

                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="selectedHotelInfoRight">
                                <ul>
                                    <li>
                                        <?php
                                            if($_GET['price'] == 'high')
                                            {
                                                $additionalHotelPrice = getClosestPriceHotelsHighToLow();
                                                $additionalHotel1PriceName = array_slice($additionalHotelPrice, 0, 1, true);
                                                $additionalHotel1Name = array_keys($additionalHotel1PriceName);
                                                $additionalHotel1 = $additionalHotel1Name[0];
                                                $hotel = new Hotels($additionalHotel1);
                                                $info = $hotel->getInfo($additionalHotel1);
                                                echo $info[0];
                                            }
                                            elseif ($_GET['price'] == 'low')
                                            {
                                                $additionalHotelPrice = getClosestHotelsLowToHigh();
                                                $additionalHotel1PriceName = array_slice($additionalHotelPrice, 0, 1, true);
                                                $additionalHotel1Name = array_keys($additionalHotel1PriceName);
                                                $additionalHotel1 = $additionalHotel1Name[0];
                                                $hotel = new Hotels($additionalHotel1);
                                                $info = $hotel->getInfo($additionalHotel1);
                                                echo $info[0];
                                            }

                                        ?>
                                    </li>
                                    <li>
                                        <?php
                                            if($_GET['price'] == 'high')
                                            {
                                                $additionalHotelPrice = getClosestPriceHotelsHighToLow();
                                                $additionalHotel1PriceName = array_slice($additionalHotelPrice, 0, 1, true);
                                                $additionalHotel1Name = array_keys($additionalHotel1PriceName);
                                                $additionalHotel1 = $additionalHotel1Name[0];
                                                $hotel = new Hotels($additionalHotel1);
                                                $info = $hotel->getInfo($additionalHotel1);
                                                echo $info[1];
                                            }
                                            elseif ($_GET['price'] == 'low')
                                            {
                                                $additionalHotelPrice = getClosestHotelsLowToHigh();
                                                $additionalHotel1PriceName = array_slice($additionalHotelPrice, 0, 1, true);
                                                $additionalHotel1Name = array_keys($additionalHotel1PriceName);
                                                $additionalHotel1 = $additionalHotel1Name[0];
                                                $hotel = new Hotels($additionalHotel1);
                                                $info = $hotel->getInfo($additionalHotel1);
                                                echo $info[1];
                                            }
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p class="card-text"></p>
                        <?php
                        if($_GET['price'] == 'high')
                        {
                            $additionalHotel = getClosestPriceHotelsHighToLow();
                            $hotel1 = array_slice($additionalHotel, 0, 1, true);
                            $hotelName = array_keys($hotel1);
                            $name = $hotelName[0];
                            $hotel = new Hotels($name);
                            $secondHotel = $hotel->setHotelName($name);
                            echo'<a href="/templates/bookHotel.php?hotel=' . $name . '" class="btn btn-primary">Book Now</a>';
                        }
                        elseif ($_GET['price'] == 'low')
                        {
                            $additionalHotel = getClosestHotelsLowToHigh();
                            $hotel1 = array_slice($additionalHotel, 0, 1, true);
                            $hotelName = array_keys($hotel1);
                            $name = $hotelName[0];
                            $hotel = new Hotels($name);
                            $secondHotel = $hotel->setHotelName($name);
                            echo'<a href="/templates/bookHotel.php?hotel=' . $name . '" class="btn btn-primary">Book Now</a>';
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div class="middleCard">
                <div class="middleHotelCard hotelCard" style="width: 18rem;">
                    <div class="row">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <?php
                                        $name = new Hotels($_GET['hotel']);
                                        $image1 = $name->getHotelImages($_GET['hotel']);
                                        $image1 = $image1[0][$_GET['hotel']][0];
                                        echo"<img src='$image1'class='d-block w-100 card-img-top compareHotelImage' alt='...'>";
                                    ?>
                                </div>
                                <div class="carousel-item">
                                    <?php
                                    $name = new Hotels($_GET['hotel']);
                                    $image2 = $name->getHotelImages($_GET['hotel']);
                                    $image2 = $image2[0][$_GET['hotel']][1];
                                    echo"<img src='$image2'class='d-block w-100 card-img-top compareHotelImage' alt='...'>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <p class="card-text"></p>
                        <?php
                            $hotel = $_GET['hotel'];
                            echo'<a href="/templates/bookHotel.php?hotel=' . $hotel . '" class="btn btn-primary">Book Now</a>'
                        ?>

                    </div>
                </div>
            </div>
            <div class="rightCard">
                <div class="rightHotelCard hotelCard" style="width: 18rem;">
                    <div class="row">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <?php
                                        if($_GET['price'] == 'high')
                                        {
                                            $additionalHotel = getClosestPriceHotelsHighToLow();
                                            $hotel1 = array_slice($additionalHotel, -1, 1, true);
                                            $hotelName = array_keys($hotel1);
                                            $name = $hotelName[0];
                                            $hotel = new Hotels($name);
                                            $image1 = $hotel->getHotelImages($name);
                                            $image1 = $image1[0]["$name"][0];
                                            echo"<img src='$image1'class='d-block w-100 card-img-top compareHotelImage' alt='...'>";
                                        }
                                        elseif ($_GET['price'] == 'low')
                                        {
                                            $additionalHotel = getClosestHotelsLowToHigh();
                                            $hotel1 = array_slice($additionalHotel, -1, 1, true);
                                            $hotelName = array_keys($hotel1);
                                            $name = $hotelName[0];
                                            $hotel = new Hotels($name);
                                            $image1 = $hotel->getHotelImages($name);
                                            $image1 = $image1[0]["$name"][0];
                                            echo"<img src='$image1'class='d-block w-100 card-img-top compareHotelImage' alt='...'>";
                                        }
                                    ?>
                                </div>
                                <div class="carousel-item">
                                    <?php
                                        if($_GET['price'] == 'high')
                                        {
                                            $additionalHotel = getClosestPriceHotelsHighToLow();
                                            $hotel1 = array_slice($additionalHotel, -1, 1, true);
                                            $hotelName = array_keys($hotel1);
                                            $name = $hotelName[0];
                                            $hotel = new Hotels($name);
                                            $image2 = $hotel->getHotelImages($name);
                                            $image2 = $image2[0]["$name"][1];
                                            echo"<img src='$image2'class='d-block w-100 card-img-top compareHotelImage' alt='...'>";
                                        }
                                        elseif ($_GET['price'] == 'low')
                                        {
                                            $additionalHotel = getClosestHotelsLowToHigh();
                                            $hotel1 = array_slice($additionalHotel, -1, 1, true);
                                            $hotelName = array_keys($hotel1);
                                            $name = $hotelName[0];
                                            $hotel = new Hotels($name);
                                            $image2 = $hotel->getHotelImages($name);
                                            $image2 = $image2[0]["$name"][1];
                                            echo"<img src='$image2'class='d-block w-100 card-img-top compareHotelImage' alt='...'>";
                                        }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php
                                if($_GET['price'] == 'high')
                                {
                                    $additionalHotel = getClosestPriceHotelsHighToLow();
                                    $hotel2 = array_slice($additionalHotel, -1, 1, true);
                                    $hotelName = array_keys($hotel2);
                                    $name = $hotelName[0];
                                    $hotel = new Hotels($name);
                                    $thirdHotel = $hotel->setHotelName($name);
                                    echo $thirdHotel;
                                }
                                elseif ($_GET['price'] == 'low')
                                {
                                    $additionalHotel = getClosestHotelsLowToHigh();
                                    $hotel2 = array_slice($additionalHotel, -1, 1, true);
                                    $hotelName = array_keys($hotel2);
                                    $name = $hotelName[0];
                                    $hotel = new Hotels($name);
                                    $thirdHotel = $hotel->setHotelName($name);
                                    echo $thirdHotel;
                                }

                            ?>
                        </h5>
                        <div class="selectedHotelInfoContainer">
                            <div class="selectedHotelInfoLeft">
                                <ul>
                                    <li>
                                        <?php
                                            if($_GET['price'] == 'high')
                                            {
                                                $additionalHotelPrice = getClosestPriceHotelsHighToLow();
                                                $additionalHotel1PriceName = array_slice($additionalHotelPrice, -1, 1, true);
                                                $additionalHotel1Name = array_keys($additionalHotel1PriceName);
                                                $additionalHotel1 = $additionalHotel1Name[0];
                                                $hotel = new Hotels($additionalHotel1);
                                                $price = $hotel->getHotelPrice($additionalHotel1) * $_GET['days'];
                                                echo "R".$price;
                                            }
                                            elseif ($_GET['price'] == 'low')
                                            {
                                                $additionalHotelPrice = getClosestHotelsLowToHigh();
                                                $additionalHotel1PriceName = array_slice($additionalHotelPrice, -1, 1, true);
                                                $additionalHotel1Name = array_keys($additionalHotel1PriceName);
                                                $additionalHotel1 = $additionalHotel1Name[0];
                                                $hotel = new Hotels($additionalHotel1);
                                                $price = $hotel->getHotelPrice($additionalHotel1) * $_GET['days'];
                                                echo "R".$price;
                                            }

                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="selectedHotelInfoRight">
                                <ul>
                                    <li>
                                        <?php
                                            if($_GET['price'] == 'high')
                                            {
                                                $additionalHotelPrice = getClosestPriceHotelsHighToLow();
                                                $additionalHotel1PriceName = array_slice($additionalHotelPrice, -1, 1, true);
                                                $additionalHotel1Name = array_keys($additionalHotel1PriceName);
                                                $additionalHotel1 = $additionalHotel1Name[0];
                                                $hotel = new Hotels($additionalHotel1);
                                                $info = $hotel->getInfo($additionalHotel1);
                                                echo $info[0];
                                            }
                                            elseif ($_GET['price'] == 'low')
                                            {
                                                $additionalHotelPrice = getClosestHotelsLowToHigh();
                                                $additionalHotel1PriceName = array_slice($additionalHotelPrice, -1, 1, true);
                                                $additionalHotel1Name = array_keys($additionalHotel1PriceName);
                                                $additionalHotel1 = $additionalHotel1Name[0];
                                                $hotel = new Hotels($additionalHotel1);
                                                $info = $hotel->getInfo($additionalHotel1);
                                                echo $info[0];
                                            }

                                        ?>
                                    </li>
                                    <li>
                                        <?php
                                            if($_GET['price'] == 'high')
                                            {
                                                $additionalHotelPrice = getClosestPriceHotelsHighToLow();
                                                $additionalHotel1PriceName = array_slice($additionalHotelPrice, -1, 1, true);
                                                $additionalHotel1Name = array_keys($additionalHotel1PriceName);
                                                $additionalHotel1 = $additionalHotel1Name[0];
                                                $hotel = new Hotels($additionalHotel1);
                                                $info = $hotel->getInfo($additionalHotel1);
                                                echo $info[1];
                                            }
                                            elseif ($_GET['price'] == 'low')
                                            {
                                                $additionalHotelPrice = getClosestHotelsLowToHigh();
                                                $additionalHotel1PriceName = array_slice($additionalHotelPrice, -1, 1, true);
                                                $additionalHotel1Name = array_keys($additionalHotel1PriceName);
                                                $additionalHotel1 = $additionalHotel1Name[0];
                                                $hotel = new Hotels($additionalHotel1);
                                                $info = $hotel->getInfo($additionalHotel1);
                                                echo $info[1];
                                            }

                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p class="card-text"></p>
                        <?php
                            if($_GET['price'] == 'high')
                            {
                                $additionalHotel = getClosestPriceHotelsHighToLow();
                                $hotel2 = array_slice($additionalHotel, -1, 1, true);
                                $hotelName = array_keys($hotel2);
                                $name = $hotelName[0];
                                $hotel = new Hotels($name);
                                $thirdHotel = $hotel->setHotelName($name);
                                echo'<a href="/templates/bookHotel.php?hotel=' . $name . '" class="btn btn-primary">Book Now</a>';
                            }
                            elseif ($_GET['price'] == 'low')
                            {
                                $additionalHotel = getClosestHotelsLowToHigh();
                                $hotel2 = array_slice($additionalHotel, -1, 1, true);
                                $hotelName = array_keys($hotel2);
                                $name = $hotelName[0];
                                $hotel = new Hotels($name);
                                $thirdHotel = $hotel->setHotelName($name);
                                echo'<a href="/templates/bookHotel.php?hotel=' . $name . '" class="btn btn-primary">Book Now</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="filterContainer">
            <label for="filters" class="form-label hotelFilters">Filters:</label>
            <br>
            <select name="filters" id="filters" class="form-select">
                <option value="" selected disabled>Select a filter</option>
                <option value="closeToBeach">Close too beach</option>
                <option value="petFriendly">Pet Friendly</option>
                <option value="wifi">Wifi Included</option>
                <option value="parking">Parking</option>
                <option value="singBedroom">1 Bedroom</option>
                <option value="doubleBedrooms">2 Bedrooms</option>
                <option value="selfCatering">Self Catering</option>
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