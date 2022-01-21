<?php

    class AppointmentModel{

        private $DB;

        public function __construct(){
            $this->DB = LibFactory::getInstance()->getLibrary('Database');
        }


        public function isExistById($id){

            $sql = "SELECT * FROM `appointment` WHERE id='$id'";
            $result = $this->DB->selectAll($sql);

            if(!is_null($result)){
                if(sizeof($result)>0){
                    // exist
                    return 1;
                }else {
                    // not exist
                    return 0;
                }
            }else {
                // db error
                return -1;
            }
        }

        public function findById($id){
            $sql = "SELECT appointment.* , doctor.firstname AS doctor_firstname, patient.firstname AS patient_firstname FROM appointment INNER JOIN doctor ON appointment.doctor_id = doctor.id INNER JOIN patient ON appointment.patient_id = patient.id WHERE appointment.id='$id' ORDER BY `date` DESC";
            $result = $this->DB->selectAll($sql);

            $output = array();

            if($result!=-1){
                if(empty($result)){
                    $output['error'] = "invalid_id";
                    $output['value'] = [];
                    // appointment not exist
                    return $output;
                }else{
                    // appointment exist
                    $output['value'] = $result[0];
                    return $output;
                }
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }
        }

        public function insert($data){

            $patient_id = $data['patient_id'];
            $doctor_id = $data['doctor'];
            $time = $data['time_24hrs'];
            $date = $data['date'];
            $receipt_id = $data['receipt_id'];
            $is_paid  = '0';
            $status  = $data['status'];
            $description = "Automatically added.";
            $exit = 0;
            $prescription_id = 0; 


            $sql = "INSERT INTO `appointment` (patient_id, doctor_id, time, date,
                        receipt_id, prescription_id, is_paid, status, description , is_exit)
                            VALUES ('$patient_id' , '$doctor_id' , '$time' , '$date' ,
                                '$receipt_id' , '$prescription_id' , $is_paid , '$status' , '$description' , $exit)";                 

            $result = $this->DB->insert($sql , [] , 'appointment');

            /*
            $data1 = array();

            $data1['data'] = $data;
            $data1['sql'] = $sql;
            $data1['result'] = $result;

            include_once '../app/views/' . "pages/dumy" . '.php';
            */
            

            return $result;

        }

        public function isDoctorFree($id , $date , $time) {
            $sql = "SELECT * FROM `appointment` WHERE `doctor_id`='$id' AND `time`='$time' AND `date`='$date'";
            $result = $this->DB->selectOne($sql);

            $output = array();

            if($result!=-1){
                if(sizeof($result)>0){
                    // busy
                    return 1;
                }else {
                    // free
                    return 0;
                }
            }else {
                // db error
                return -1;
            }

        }

        public function findByPatientId($patientid){
            $sql = "SELECT * FROM `appointment` WHERE patient_id = $patientid AND is_exit = 0 AND status = 'PENDING' ORDER BY `date` DESC";

            $sql1 = "SELECT appointment.id , appointment.doctor_id , appointment.time , appointment.date , appointment.receipt_id , appointment.prescription_id , appointment.is_paid , appointment.description , appointment.is_rated , appointment.is_exit , appointment.status , appointment.zoom_link , doctor.firstname FROM appointment INNER JOIN doctor ON appointment.doctor_id=doctor.id WHERE appointment.patient_id = $patientid AND appointment.is_exit = 0 AND appointment.status = 'PENDING' ORDER BY appointment.date DESC";

            $result = $this->DB->selectAll($sql1);

            $output = array();

            if($result!=-1){
                if(empty($result)){
                    $output['error'] = "empty";
                    $output['value'] = [];
                    // appointment not exist
                    return $output;
                }else{
                    // appointment exist
                    $output['value'] = $result;
                    return $output;
                }
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }
        }

        public function findByDoctorId($doctorid){
            $sql = "SELECT * FROM `appointment` WHERE doctor_id = $doctorid AND is_exit = 0 AND status = 'PENDING' ORDER BY `date` DESC";

            $sql1 = "SELECT appointment.id , appointment.doctor_id , appointment.time , appointment.date , appointment.receipt_id , appointment.prescription_id , appointment.is_paid , appointment.description , appointment.is_rated , appointment.is_exit , appointment.status , appointment.zoom_link , patient.firstname , patient.telephone FROM appointment INNER JOIN patient ON appointment.patient_id=patient.id WHERE appointment.doctor_id = $doctorid AND appointment.is_exit = 0 AND appointment.status = 'PENDING' ORDER BY appointment.date DESC";

            $result = $this->DB->selectAll($sql1);

            $output = array();

            if($result!=-1){
                if(empty($result)){
                    $output['error'] = "empty";
                    $output['value'] = [];
                    // appointment not exist
                    return $output;
                }else{
                    // appointment exist
                    $output['value'] = $result;
                    return $output;
                }
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }
        }

        public function getAll(){
            $sql = "SELECT * FROM `appointment` WHERE is_exit= 0 ORDER BY `date` DESC";
            $result = $this->DB->selectAll($sql);
            return $result;
        }

        public function getLimited($limit){
            $status = false;
            $sql = "SELECT * FROM `appointment` WHERE `is_exit`='$status' ORDER BY `date` DESC";
            $result = $this->DB->selectAll($sql);
            return $result;
        }

        public function cancel($id){
            $sql = "UPDATE `appointment` SET `is_exit` = 1 WHERE id = $id;";
            $result = $this->DB->update($sql);
            return $result;
        }

        public function confirm($id){
            $sql = "UPDATE `appointment` SET `status` = 'CONFIRMED' WHERE id = $id;";
            $result = $this->DB->update($sql);
            return $result;
        }

        public function addZoomLink($id , $link){
            $sql = "UPDATE `appointment` SET `zoom_link` = '$link' WHERE id = $id;";
            $result = $this->DB->update($sql);
            return $result;
        }

        public function marksPaid($id){
            $sql = "UPDATE `appointment` SET `is_paid` = 1 WHERE id = $id;";
            $result = $this->DB->update($sql);
            return $result;
        }

        public function marksUnPaid($id){
            $sql = "UPDATE `appointment` SET `is_paid` = 0 WHERE id = $id;";
            $result = $this->DB->update($sql);
            return $result;
        }

        public function rate($id){
            $sql = "UPDATE `appointment` SET `is_rated` = 1 WHERE id = $id;";
            $result = $this->DB->update($sql);
            return $result;
        }

        public function addPrescriptionId($id , $p_id){
            $sql = "UPDATE `appointment` SET `prescription_id` = '$p_id' WHERE id = $id;";
            $result = $this->DB->update($sql);
            return $result;
        }

        public function getConfirmedByPatient($patient_id){
            $sql = "SELECT * FROM `appointment` WHERE patient_id = $patient_id AND is_exit = 0 AND status = 'CONFIRMED' ORDER BY `date` DESC";

            $sql1 = "SELECT appointment.id , appointment.doctor_id , appointment.time , appointment.date , appointment.receipt_id , appointment.prescription_id , appointment.is_paid , appointment.description , appointment.is_rated , appointment.is_exit , appointment.status , doctor.firstname FROM appointment INNER JOIN doctor ON appointment.doctor_id=doctor.id WHERE appointment.patient_id = $patient_id AND appointment.is_exit = 0 AND appointment.status = 'CONFIRMED' ORDER BY appointment.date DESC";
            $result = $this->DB->selectAll($sql1);

            $output = array();

            if($result!=-1){
                if(empty($result)){
                    $output['error'] = "empty";
                    $output['value'] = [];
                    // appointment not exist
                    return $output;
                }else{
                    // appointment exist
                    $output['value'] = $result;
                    return $output;
                }
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }
        }

        public function getConfirmedByDoctor($doctor_id){
            $sql = "SELECT * FROM `appointment` WHERE doctor_id = $doctor_id AND is_exit = 0 AND status = 'CONFIRMED' ORDER BY `date` DESC";

            $sql1 = "SELECT appointment.id , appointment.doctor_id , appointment.time , appointment.date , appointment.receipt_id , appointment.prescription_id , appointment.is_paid , appointment.description , appointment.is_rated , appointment.is_exit , appointment.status , patient.firstname , patient.telephone FROM appointment INNER JOIN patient ON appointment.patient_id=patient.id WHERE appointment.doctor_id = $doctor_id AND appointment.is_exit = 0 AND appointment.status = 'CONFIRMED' ORDER BY appointment.date DESC";

            $result = $this->DB->selectAll($sql1);

            $output = array();

            if($result!=-1){
                if(empty($result)){
                    $output['error'] = "empty";
                    $output['value'] = [];
                    // appointment not exist
                    return $output;
                }else{
                    // appointment exist
                    $output['value'] = $result;
                    return $output;
                }
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }
        }


        public function findConfirmedForAdmin(){

            $sql = "SELECT appointment.id , appointment.doctor_id , appointment.time , appointment.date , appointment.receipt_id , appointment.prescription_id , appointment.is_paid , appointment.description , appointment.is_rated , appointment.is_exit , appointment.status , doctor.firstname AS doctor_firstname , patient.firstname AS patient_firstname , patient.gender AS patient_gender FROM appointment INNER JOIN doctor ON doctor.id=appointment.doctor_id INNER JOIn patient ON patient.id=appointment.patient_id WHERE appointment.is_exit = 0 AND appointment.status = 'CONFIRMED'";

            $result = $this->DB->selectAll($sql);

            $output = array();

            if($result!=-1){
                if(empty($result)){
                    $output['error'] = "empty";
                    $output['value'] = [];
                    // appointment not exist
                    return $output;
                }else{
                    // appointment exist
                    $output['value'] = $result;
                    return $output;
                }
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }

        }

        public function findPendingForAdmin(){
            $sql = "SELECT appointment.id , appointment.doctor_id , appointment.time , appointment.date , appointment.receipt_id , appointment.prescription_id , appointment.is_paid , appointment.description , appointment.is_rated , appointment.is_exit , appointment.status , doctor.firstname AS doctor_firstname , patient.firstname AS patient_firstname , patient.gender AS patient_gender FROM appointment INNER JOIN doctor ON doctor.id=appointment.doctor_id INNER JOIn patient ON patient.id=appointment.patient_id WHERE appointment.is_exit = 0 AND appointment.status = 'PENDING'";

            $result = $this->DB->selectAll($sql);

            $output = array();

            if($result!=-1){
                if(empty($result)){
                    $output['error'] = "empty";
                    $output['value'] = [];
                    // appointment not exist
                    return $output;
                }else{
                    // appointment exist
                    $output['value'] = $result;
                    return $output;
                }
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }

        }

        public function isDoctorHasAppointments($doctor_id){
            $sql = "SELECT * FROM `appointment` WHERE `doctor_id` = $doctor_id AND `is_exit` = 0 AND `status`='PENDING'";

            $result = $this->DB->selectAll($sql);

            $output = array();

            if($result!=-1){
                if(empty($result)){
                    $output['value'] = 1;
                    // appointment not exist
                    return $output;
                }else{
                    // appointment exist
                    $output['value'] = 0;
                    return $output;
                }
            }else {
                // db error
                $output['value'] = -1;
                return $output;
            }


        }

        public function isPatientHasAppointments($patient_id){
            $sql = "SELECT * FROM `appointment` WHERE `patient_id` = $patient_id AND `is_exit` = 0 AND `status`='PENDING'";

            $result = $this->DB->selectAll($sql);

            $output = array();

            if($result!=-1){
                if(empty($result)){
                    $output['value'] = 1;
                    // appointment not exist
                    return $output;
                }else{
                    // appointment exist
                    $output['value'] = 0;
                    return $output;
                }
            }else {
                // db error
                $output['value'] = -1;
                return $output;
            }


        }
    }
