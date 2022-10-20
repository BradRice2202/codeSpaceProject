<?php
session_start();
include "../app/Hotels.php";
//echo "<pre>";
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
<body class="confirmationBody">
<div class="confirmationContainer">
    <div class="confirmationDetails">
        <div class="card confirmationCard">
            <div class="row">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <?php
                                $hotel = new Hotels($_SESSION['hotel']);
                                $images = $hotel->getHotelImages($_SESSION['hotel']);
                                $image1 = $images[0][$_SESSION['hotel']][0];
                                echo"<img src='$image1'class='d-block confirmImage  card-img-top' alt='...'>";
                            ?>
                        </div>
                        <div class="carousel-item">
                            <?php
                            $hotel = new Hotels($_SESSION['hotel']);
                            $images = $hotel->getHotelImages($_SESSION['hotel']);
                            $image2 = $images[0][$_SESSION['hotel']][1];
                            echo"<img src='$image2'class='d-block confirmImage  card-img-top' alt='...'>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body confirmCardBody">
                <h5 class="card-title">Confirmation Details</h5>
                <div class="confirmationDetailsContainer">
                    <div class="confirmationLeftDetails">
                        <ul>
                            <li>
                                Name: <?php echo $_SESSION['name'];?>
                            </li>
                            <li>
                                Last Name: <?php echo $_SESSION['lname'];?>
                            </li>
                        </ul>
                    </div>
                    <div class="confirmationRightDetails">
                        <ul>
                            <li>
                                Duration: <?php echo $_SESSION['days']." days";?>
                            </li>
                            <li>
                                Hotel: <?php
                                $hotel = new Hotels($_SESSION['hotel']);
                                $name = $hotel->setHotelName($_SESSION['hotel']);
                                echo $name;
                                ?>
                            </li>
                            <li>
                                Price: <?php
                                $hotel = new Hotels($_SESSION['hotel']);
                                $price = $hotel->getHotelPrice($_SESSION['hotel']) * $_SESSION['days'];
                                echo "R ".$price;
                                ?>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="confirmationBtn">
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>