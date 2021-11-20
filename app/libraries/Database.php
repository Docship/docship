<?php
final class Database {

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pwd = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;

    private static $database;

    protected function __construct(){

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
    }

    public static function getInstance(){

        if(!is_null(self::$database)){
          self::$database = new Database;
        }
        return self::$database;
      }

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

}