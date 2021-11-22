<?php

include '../repository/Patient.repo.php';

class PatientSignup  extends PatientRepository{

    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $repassword;
    private $bday;
    private $gender;
    private $telephone;

    public function __construct($firstName, $lastName, $email, $telephone, $password , $repassword, $bday, $gender){

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->repassword = $repassword;
        $this->bday = $bday;
        $this->gender = $gender;
        $this->telephone = $telephone;

    }

    public function signupPatient(){
        
        if($this->emptyInput() == false){
            header("Location:../login-signup.html.php?error=emptyInput");
            exit();
        }

        if($this->invalidName($this->firstName) == false){
            header("Location:../login-signup.html.php?error=invalidFirstname");
            exit();
        }

        if($this->invalidName($this->lastName) == false){
            header("Location:../login-signup.html.php?error=invalidLastname");
            exit();
        }
        
        if($this->pwdMatch() == false){
            header("Location:../login-signup.html.php?error=pwdmatch");
            exit();
        }
        

        if($this->invalidEmail() == false){
            header("Location:../login-signup.html.php?error=invalidemail");
            exit();
        }

        if($this->IsPatientTaken() == false){
            header("Location:../login-signup.html.php?error=patientexist");
            exit();
        }
        

        $this->setPatient($this->firstName , $this->lastName , $this->email, $this->password, $this->bday , $this->gender , $this->telephone);
    }

    private function emptyInput() {

        $result = true;
        if(empty($this->firstName) || empty($this->lastName) || empty($this->email) || empty($this->password) || empty($this->repassword) || empty($this->bday) || empty($this->gender || $this->phone || empty($this->telephone))){
            $result = false;
        }

        return $result;
    }

    private function invalidName($name) {

        $result = true;

        if(!preg_match("/^[a-zA-Z0-9]*$/", $name)){
            $result = false;
        }

        return $result;
    }

    private function invalidEmail() {

        $result = true;

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }

        return $result;
    }

    private function pwdMatch(){

        $result = true;

        if($this->password != $this->repassword){
            $result = false;
        }

        return $result;
    }

    private function IsPatientTaken() {
        $result = true;

        if(!$this->checkPatient($this->email, $this->telephone)){
            $result = false;
        }

        return $result;
    }



}