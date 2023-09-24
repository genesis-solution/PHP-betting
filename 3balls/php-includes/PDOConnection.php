<?php 

 class Database {
     private $conn; 
     private $db_host = "localhost";
     private $database = "admin_pick3";
     private $db_user = "pick3";
     private $db_pass = "Pick3@2023";
     
     //DB Connect 
     public function connect(){
         $this->conn = null;
         
         try {
            $this->conn = new PDO('mysql:host=' . $this->db_host . ';dbname=' . $this->database, $this->db_user,$this->db_pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         } catch(PDOException $e) {
            // echo "Connection Error:" . $e->getMessage();
            throw new PDOException($e->getMessage(), (int)$e->getCode());
         }

         return $this->conn;
     }

 }