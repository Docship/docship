<?php

include '../repository/Patient.repo.php';

class PatientLogin  extends PatientRepository{

    
    private $email;
    private $password;

    public function __construct($email, $password){
        $this->email = $email;
        $this->password = $password;
    }

    public function loginPatient(){
        if($this->emptyInput() == false){
            header("Location:../login-signup.html.php?error=emptyInput");
            exit();
        }

        if($this->invalidEmail() == false){
            header("Location:../login-signup.html.php?error=invalidemail");
            exit();
        }

        $this->getPatientByEmailAndPassword($this->email, $this->password);

    }

    private function emptyInput() {

        $result = true;
        if(empty($this->email) || empty($this->password)){
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



}