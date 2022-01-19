<?php
final class Database {

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pwd = DB_PASS;
    private $dbname = DB_NAME;

    private $mysqli;

    private static $database;

    public function __construct(){

        /*
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try{
            $this->dbh = new PDO($dsn, $this->user , $this->pwd, $options);

        } catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
        */

        $this->mysqli = new mysqli($this->host,$this->user,$this->pwd, $this->dbname);


    }

    public static function getInstance(){

        if(!is_null(self::$database)){
          self::$database = new Database;
        }
        return self::$database;
      }

    public function insert($sql , $params = [] , $table){

        try{
            if ($this->mysqli -> connect_errno) {
                //echo "Failed to connect to MySQL: " . $this->mysqli -> connect_error;
                return -1;
              }

            if($this->mysqli->query($sql)){
                sleep(0.5);
                return 0;
            }
            if($this->mysqli→errno){
                return 1;
            }
            /*
            if (!$this->mysqli -> query($sql)) {
                return -1;
            }
            */
            return 0;
            //$this->mysqli -> close();
            
            //return $id;
        }catch(Exception $e){
            //$this->mysqli -> close();
            return -1;
        }

        /*
        try{
            $stmt = $this->dbh->prepare($sql);
            foreach($params as $key => $val){
                $type = $this->getType($val);
                $stmt->bindValue($key , $val , $type);
            }
            $stmt->execute();
            return 1; 
        }catch(PDOException $e){
            return -1;
        }

        */
    }
    
    public function selectAll($sql , $params = []){

        try{

            if ($this->mysqli -> connect_errno) {
                //echo "Failed to connect to MySQL: " . $this->mysqli -> connect_error;
                return -1;
            }
            $result = $this->mysqli->query($sql);

            if($result->num_rows > 0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else {
                return [];
            }
            //$this->mysqli -> close();

            $result_arr = $result->fetch_all(MYSQLI_ASSOC);
            mysqli_free_result($result);
            
            return $result_arr;
        }catch(Exception $e){
            //$this->mysqli -> close();
            return -1;
        }

        /*
        try{
            $stmt = $this->dbh->prepare($sql);
            
            foreach($params as $key => $val){
                $type = $this->getType($val);
                $stmt->bindValue($key , $val , $type);
            }
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
            die($e->getMessage());
            return null;
        }
        */
    }

    public function selectOne($sql , $params = []){
        try{
            if ($this->mysqli -> connect_errno) {
                echo "Failed to connect to MySQL: " . $this->mysqli -> connect_error;
                return -1;
            }
            $result = $this->mysqli->query($sql);
            //$this->mysqli -> close();
            
            return $result->fetch_assoc();
        }catch(Exception $e){
            //$this->mysqli -> close();
            return -1;
        }
    }

    private function getType($value , $type = null){
        switch(true){
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;    
        }

        return $type;
    }

    /*
      
    public function query($sql){
        $stmt = $this->dbh->prepare($sql);
        return $stmt;
    }

    public function bind($stmt ,$param , $value , $type = null){
        if(is_null($stmt)){
            return ERR_DB;
        }
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                $type = PDO::PARAM_STR;    
            }
        }

        $stmt->bindValue($param , $value , $type);
        return $stmt;
    }

    public function bindMultiple($stmt , $lst){

        if(!is_null($lst) && !is_null($stmt)){
            foreach($lst as $l){
                $this->bind($stmt ,$l[0] , $l[1]);
            }
            return $stmt;
        }
        return ERR_DB;  
    }

    public function execute($stmt){
        return $stmt->execute();
    }

    public function resultSet($stmt){
        if(!is_null($stmt)){
            $this->execute($stmt);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        return ERR_DB;
    }

    public function singleResult($stmt){
        if(!is_null($stmt)){
            $this->execute($stmt);
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        return ERR_DB;
    }

    public function rowCount($stmt){
        if(!is_null($stmt)){
            $this->execute($stmt);
            return $stmt->rowCount();
        }
        return ERR_DB;
        
    }
    */

    public function delete($sql , $params = []){
        try{
            if ($this->mysqli -> connect_errno) {
                echo "Failed to connect to MySQL: " . $this->mysqli -> connect_error;
                return -1;
            }
            if($this->mysqli->query($sql)){
                return 0;
            }
            if($this->mysqli→errno){
                return 1;
            }
            
        }catch(Exception $e){
            return -1;
        }
    }

    public function update($sql , $params = []){
        try{
            if ($this->mysqli -> connect_errno) {
                echo "Failed to connect to MySQL: " . $this->mysqli -> connect_error;
                return -1;
            }
            if($this->mysqli->query($sql)){
                return 0;
            }
            if($this->mysqli→errno){
                return 1;
            }
            
        }catch(Exception $e){
            return -1;
        }
    }

    public function getLast($table){
        $sql = "SELECT * FROM `$table` ORDER BY ID DESC LIMIT 1";

        try{
            if ($this->mysqli -> connect_errno) {
                return -1;
            }
            $result = $this->mysqli->query($sql);
            
            return $result->fetch_all(MYSQLI_ASSOC);
        }catch(Exception $e){
            //$this->mysqli -> close();
            return -1;
        }

    }


}