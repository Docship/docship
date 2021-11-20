<?php

include '../config/DB.config.php';

class PatientRepository extends Dbh {

    protected function checkPatient($email, $telephone){

        $sql = "SELECT * FROM patient WHERE email = '$email' AND telephone = '$telephone'";
        $conn = $this->connect();
        $result = $conn->query($sql);
        $resultCheck =true;

        if ($result->num_rows > 0) {
            $resultCheck = false;
        }
        
        $conn->close();
        $sql = NULL;

        return $resultCheck;

        /*
        $stmt = $this->connect()->prepare('SELECT * FROM patient WHERE email = ? AND telephone = ?');

        if(!$stmt->execute(array($email, $telephone))) {
            $stmt = NULL;
            header("Location:../login-signup.html.php?error=stmtfailed");
            exit();
        }

        $resultCheck =NULL;

        if($stmt->rowCount() > 0){ $resultCheck = false; }
        else{ $resultCheck = true; }

        return $resultCheck;
        */
    }

    protected function setPatient($firstName , $lastName , $email, $password, $bday , $gender , $telephone){

        $hashpwd = password_hash($password , PASSWORD_DEFAULT);

        $sql = "INSERT INTO `patient`(`firstname`, `lastname`, `email`, `pwd`, `bday`, `gender` , `telephone`) VALUES ('$firstName' , '$lastName' , '$email' , '$hashpwd' , '$bday' , '$gender' , '$telephone')";

        $conn = $this->connect();

        if (mysqli_query($conn, $sql)) {
            return;
          }
        else{
            $sql = NULL;
            mysqli_close($conn);
            header("Location:../login-signup.html.php?error=insertionfailed");
            exit();
        } 
        $sql = NULL;
        mysqli_close($conn);



        /*
        $stmt = $this->connect()->prepare('INSERT INTO patient (firstName,lastName,email,pwd,bday,gender) VALUES (?,?,?,?,?,?);');

        $hashpwd = password_hash($password , PASSWORD_DEFAULT);

        if(!$stmt->execute(array($firstName , $lastName , $email, $hashpwd, $bday , $gender))) {
            $stmt = NULL;
            header("Location:../login-signup.html.php?error=stmtfailed");
            exit();
        }

        $stmt = NULL;
        */
    }

    protected function getPatientByEmailAndPassword($email, $password){

        $sql = "SELECT * FROM patient WHERE email = '$email'";
        $conn = $this->connect();
        $result = $conn->query($sql);

        if ($result->num_rows <= 0) {
            $sql = NULL;
            mysqli_close($conn);
            header("Location:../login-signup.html.php?error=patientinvalid");
            exit();
        }

        $patient = $result->fetch_assoc();
        $pwd = $patient['pwd'];

        $pwdmatch = password_verify($password , $pwd);

        if(!$pwdmatch) {
            $sql = NULL;
            mysqli_close($conn);
            header("Location:../login-signup.html.php?error=pwdnotmatched");
            exit();
        }

        session_start();

        $_SESSION['p_email'] = $patient['email'];
        $_SESSION['p_telephone'] = $patient['telephone'];
        $_SESSION['p_firstname'] = $patient['firstname'];
        $_SESSION['p_lastname'] = $patient['lastname'];

        $sql = NULL;
        mysqli_close($conn);
        /*
        $stmt = $this->connect()->prepare('SELECT * FROM patient WHERE email = ?');

        if(!$stmt->execute(array($email))) {
            $stmt = NULL;
            header("Location:../login-signup.html.php?error=stmtfailed");
            exit();
        }


        if($stmt->rowCount() <= 0){
            $stmt = NULL;
            header("Location:../login-signup.html.php?error=patientnotexist");
            exit();
        }

        $hashpwd = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkpwd = password_verify($password , $hashpwd[0]['pwd']);

        if($checkpwd == false){
            $stmt = NULL;
            header("Location:../login-signup.html.php?error=wrongpwd");
            exit();
        }
        else if($checkpwd == true){
            $stmt = $this->connect()->prepare('SELECT * FROM patient WHERE email = ? AND pwd = ?');

            if(!$stmt->execute(array($email , $password))) {
                $stmt = NULL;
                header("Location:../login-signup.html.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() <= 0){
                $stmt = NULL;
                header("Location:../login-signup.html.php?error=patientnotexist");
                exit();
            }

            $patient = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();

            $_SESSION = $patient[0]['email'];
            $_SESSION = $patient[0]['telephone'];
            $_SESSION = $patient[0]['firstname'];
            $_SESSION = $patient[0]['lastname'];

            $stmt = NULL;
            */

        }


}



