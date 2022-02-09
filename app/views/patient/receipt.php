<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


    <title>Invoice</title>
</head>

<body>
    <div class="vh-100 wrapper d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-sm-12 col-md-9 col-lg-7 px-5 py-5 border border-secondary rounded">
                    <h2 class="text-center mb-2 mb-md-4 mb-lg-5" > <b>Recipt</b> </h2>
                    <div class="row mb-2">
                        <div class="col-sm-12 col-md-6 pl-0">
                            <div><b>Patient ID: </b> <span><?php echo $data['receipt']['patient_id'] ?></span> </div>
                            <div><b>Bank: </b> <span><?php echo $data['receipt']['bank_name'] ?></span> </div>
                            <div><b>Branch: </b> <span><?php echo $data['receipt']['bank_branch'] ?></span> </div>
                            <div><b>Account No: </b> <span><?php echo $data['receipt']['bank_acc_no'] ?></span> </div>
                        </div>
                        <div class="col-sm-12 col-md-6 text-left text-md-right pl-0">
                            <div><b>Issued Date: </b> <span><?php echo $data['receipt']['issue_date'] ?></span></div>
                            <div><b>Expired Date: </b> <span><?php echo $data['receipt']['expiry_date'] ?></span></div>
                            <div><b>Receipt ID: </b> <span><?php echo $data['receipt']['id'] ?></span> </div>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td class="col-md-10">Amount</td>
                                    <td class="col-md-2 text-center"><?php echo $data['receipt']['amount'] ?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-10">Discount</td>
                                    <td class="col-md-2 text-center"><?php echo $data['receipt']['discount'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-left">
                                        <h4><strong>Total:</strong></h4>
                                    </td>
                                    <td class="text-center text-danger">
                                        <h4><strong><?php echo $data['receipt']['total'] ?></strong></h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="<?php echo URLROOT; ?>/<?php echo ($_SESSION['role'] == 'patient')?'patient':'admin' ?>/appointments" class="btn btn-success btn-lg btn-block">OK</a>
                        <!-- <button type="button" class="btn btn-danger btn-lg btn-block">
                        Not Completed
                    </button> -->
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
</body>

</html>