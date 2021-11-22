<?php

class Dbh {

    protected function connect() {

        /*

        try {
            $username = "root";
            $pwd = "";
            $dbh = new PDO('mysql:host=localhost;dbname=docship', $username, $pwd);

            return $dbh;

        }catch (PDOException $e) {
            print "Error: " . $e->getMessage() . '<br/>';
            die();
        }
        */

        $servername = "localhost";
        $username = "root";
        $password = "";
        $DB = "docship";

        $conn = mysqli_connect($servername, $username, $password , $DB);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        return $conn;
    }
}