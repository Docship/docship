<?php

// patient login
if(isset($_POST['submit_patient'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    include '../model/PatientLogin.class.php';
    $plogin = new PatientLogin($email, $password);

    $plogin->loginPatient();

    header('Location:../patient-dashboard.html.php?error=none');
}