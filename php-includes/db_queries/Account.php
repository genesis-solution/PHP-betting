<?php

class Account {

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function user($username){
        $query = 'SELECT * FROM users WHERE username = ?'; 
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username]);

        $numRow = $stmt->rowCount();
        
        if(!empty($numRow)) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $user = array(
                    "id" => $row['id'],
                    "username" => $row['username'],
                    "sponsor" => $row['sponsor'],
					"starting_wallet" => $row['starting_wallet'],
                    "wallet" => $row['wallet'],
                );
            }

            return $user;
        } else {
            return false;
        }
    }

}