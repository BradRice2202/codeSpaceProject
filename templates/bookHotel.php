<?php
session_start();
include "../app/Hotels.php";
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
</head>
<body>
<nav></nav>
<section>
    <div class="container-fluid w-100 d-flex justify-content-center align-items-center bookHotelContainer">
        <div class="container-fluid mt-5 mb-5">
            <div class="mt-5">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-12 col-md-4 shadow-lg p-5 bg-light">
                        <div class="text-center">
                            <h5>Book Hotel</h5>
                        </div>
                        <form method="post" id="login-form" action="/templates/checkout.php">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="firstName" class="form-label">First Name:</label>
                                        <input type="text" class="form-control" placeholder="First Name" required name="firstName" id="firstName" value="<?php echo $_SESSION['name'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="numberOfDays" class="form-label">Number of days:</label>
                                        <input type="text" class="form-control" placeholder="Number of days:" required name="numberOfDays" id="numberOfDays" value="<?php echo $_SESSION['days'] ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="lastName" class="form-label">Last Name:</label>
                                        <input type="text" class="form-control" placeholder="Last Name" required name="lastName" id="lastName" value="<?php echo $_SESSION['lname'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="hotel">Hotel:</label>
                                        <input type="text" class="form-control" placeholder="Hotel" required name="hotel" readonly="readonly" id="hotel" value="<?php
                                            $hotel = new Hotels($_GET['hotel']);
                                            $name = $hotel->setHotelName($_GET['hotel']);
                                            echo "$name";?>
                                        ">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3 email-input-book">
                                    <label for="email" class="form-label email-title-book">Email:</label>
                                    <input type="email" id="email" class="email form-control" required name="email" placeholder="Enter your email">
                                </div>
                            </div>
                            <div class="mb-3 d-flex justify-content-center">
                                <button class="btn btn-primary loginBtn form-control w-50" type="submit">Check Out</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>