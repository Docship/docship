<?php

if(isset($_POST['submit'])){

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $bday = $_POST['bday'];
    $gender = $_POST['gender'];
    
    include '../model/PatientSignUp.class.php';

    $psignup = new PatientSignUp($firstName, $lastName, $email, $telephone, $password , $repassword, $bday, $gender);

    $psignup->signupPatient();

    header('Location:../login-signup.html.php?error=none');

}
