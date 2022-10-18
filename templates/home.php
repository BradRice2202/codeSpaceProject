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

</head>
<body>
<video autoplay muted loop id="myVideo">
    <source src="../images/backgroundVideo.mp4" type="video/mp4">
</video>
<nav>
    <?php
        include '../components/navbar.html';
    ?>
</nav>
<div class="container hotelContainer">
    <div class="selectedHotelCardContainer">
        <div class="card selectedHotelCard">
            <div class="row">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <?php
                                $hotel = new Hotels($_POST['hotelName']);
                                $images = $hotel->getHotelImages($_POST['hotelName']);
                                $image1 = $hotel->getHotelImages($_POST['hotelName']);
                                $image1 = $image1[0][$_POST['hotelName']][0];
                                echo"<img src='$image1'class='d-block w-100 card-img-top' alt='...'>";
                            ?>
                        </div>
                        <div class="carousel-item">
                            <?php
                                $hotel = new Hotels($_POST['hotelName']);
                                $images = $hotel->getHotelImages($_POST['hotelName']);
                                $image2 = $hotel->getHotelImages($_POST['hotelName']);
                                $image2 = $image2[0][$_POST['hotelName']][1];
                                echo"<img src='$image2'class='d-block w-100 card-img-top' alt='...'>";
                            ?>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="card-body cardBody">
                <div class="cardTitle cardTitle">
                    <h5 class="card-title">Hotel Info</h5>
                </div>
                <div class="hotelInfo">
                    <div class="hotelName">
                        <ul>
                            <li>
                                <?php
                                    $hotel= new Hotels($_POST['hotelName']);
                                    $hotelName = $hotel->setHotelName($_POST['hotelName']);
                                    echo "$hotelName";
                                ?>
                            </li>
                        </ul>
                    </div>
                    <div class="hotelPrice">
                        <ul>
                            <li>
                                <?php
                                    $hotel = new Hotels($_POST['hotelName']);
                                    $price = $hotel->getHotelPrice($_POST['hotelName']) * $_POST["numberOfDays"];
                                    $days = $hotel->getDays($_POST["numberOfDays"]);
                                    echo"R$price for $days Days";
                                ?>
                            </li>
                            <li>
                                <?php
                                    $hotel = new Hotels ($_POST['hotelName']);
                                    $info = $hotel->getInfo($_POST['hotelName']);
                                    echo"$info[0]";
                                ?>
                            </li>
                            <li>
                                <?php
                                    $hotel = new Hotels ($_POST['hotelName']);
                                    $info = $hotel->getInfo($_POST['hotelName']);
                                    echo"$info[1]";
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="compareBookBtnContainer">
                    <div>
                        <?php
                            $selectedHotel = $_POST['hotelName'];
                            $days = $_POST['numberOfDays'];
                            echo '<a href="../templates/compareHotels.php?hotel=' . $selectedHotel . '&days=' . $days . ' " class="btn btn-primary compareBtn">Compare Options</a>'
                        ?>
                    </div>
                    <div>
                        <a href="" class="btn btn-primary compareBtn">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>