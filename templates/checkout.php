<?php
include "../app/Hotels.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>
<body>
    <section>
        <div class="container-fluid w-100 d-flex justify-content-center paymentContainer">
            <div class="container-fluid mt-5 mb-5">
                <div class="mt-5">
                    <div class="rounded d-flex justify-content-center">
                        <div class="col-12 col-md-4 shadow-lg p-5 bg-light">
                            <div>
                                <h5>Payment</h5>
                                <form action="/templates/confirm.php" method="post" id="paymentForm">
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label mt-2" for="cardHolderName">Card holder name</label>
                                            <input type="text" class="form-control" placeholder="Card holder name" id="cardHolderName" name="cardHolderName">
                                        </div>
                                        <div class="col">
                                            <label class="form-label mt-2" for="accNo">Account No.</label>
                                            <input type="text" class="form-control" placeholder="Account No." id="accNo" name="accNo">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label mt-2" for="expDate">Expiration Date</label>
                                            <input type="text" class="form-control" placeholder="Expiration Date" id="expDate" name="expDate">
                                        </div>
                                        <div class="col">
                                            <label class="form-label mt-2" for="cvv">CVV</label>
                                            <input type="text" class="form-control" placeholder="CVV" id="cvv" name="cvv">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label mt-2" for="accType">Account Type</label>
                                            <div class="input-group mb-3">
                                                <select name="accType" id="accType" class="form-select">
                                                    <option selected="true" disabled="true">Select A Option</option>
                                                    <option value="Savings">Savings</option>
                                                    <option value="Cheque">Cheque</option>
                                                    <option value="Credit">Credit</option>
                                                    <option value="Current">Current</option>
                                                    <option value="Debit">Debit</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="form-label mt-2" for="bankName">Bank Name</label>
                                            <input type="text" class="form-control" placeholder="Bank Name" id="bankName">
                                        </div>
                                    </div>
                                    <div class="mb-3 d-flex justify-content-center">
                                        <button class="btn btn-primary loginBtn form-control w-50"  type="submit">Proceed</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>