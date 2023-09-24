<?php

date_default_timezone_set("Asia/Manila");
// include('Game.php');

class Player {
    private $conn;
    public $dateTimeToday;

    public function __construct($db){
        $this->conn = $db;
        $this->dateTimeToday = date("Y-m-d h:i:sA");
    }

    public function insertBet($userid,$username,$sponsor,$data,$balance_before,$balance_after){

        $combinations = $data['first'].'-'.$data['second'].'-'.$data['third'];
        $genTicketNum = explode('-', $data['ticket']);
        $finalTicket = $genTicketNum[0].'-'.$userid.'-'.$genTicketNum[1].'-'.$genTicketNum[2];
        

        $query = 'INSERT INTO bets (username,sponsor,game_time,1st_ball,2nd_ball,3rd_ball,combinations,amount,balance_before_bet,balance_after_bet,ticket_number,date_placed) 
                  VALUES (?,?,?,?,?,?,?,?,?,?,?,?)'; 
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username,$sponsor,$data['gameTime'],$data['first'],$data['second'],$data['third'],$combinations,$data['amount'],$balance_before,$balance_after,$finalTicket,$this->dateTimeToday]);

        $numRow = $stmt->rowCount();
        
        if(!empty($numRow)) {
            return $this->receipt($username,$data['gameTime']);;
            // return true;
        } else {
            return false;
        }
    }

    public function adjustWallet($username,$newBalance){
        $query = 'UPDATE users SET wallet = ? WHERE username = ?'; 
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$newBalance,$username]);

        $numRow = $stmt->rowCount();
        
        if(!empty($numRow)) {
            return true;
        } else {
            return false;
        }
    }

    public function receipt($username,$gameTime){
        $query = 'SELECT * FROM bets WHERE username = ? AND game_time = ? ORDER BY id DESC LIMIT 1'; 
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username,$gameTime]);

        $numRow = $stmt->rowCount();
        
        if(!empty($numRow)) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $ticketInfo = array(
                    "bet_id" => $row['id'],
                    "username" => $row['username'],
                    "game_time" => $row['game_time'],
                    "first_ball" => $row['1st_ball'],
                    "second_ball" => $row['2nd_ball'],
                    "third_ball" => $row['3rd_ball'],
                    "amount" => $row['amount'],
                    "ticket_number" => $row['ticket_number'],
                    "date" => $row['date_placed'],
                );
            }
            return $ticketInfo;
        } else {
            return false;
        }
    }

    // Note: wallet method iis for testing purpose.
    public function wallet($username){
        
        $query = "SELECT * FROM users WHERE username = ?"; 
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username]);
        
        $numRow = $stmt->rowCount();
        
        // $data = array();
        if(!empty($numRow)) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $data = array(
                    'username' => $row['username'],
                    'sponsor' => $row['sponsor'],
                    'full_name' => $row['full_name'],
                    'mobile' => $row['mobile'],
                    'email' => $row['email'],
                    'wallet' => $row['wallet'],
                    'commission' => $row['commission'],
                    'date_joined' => $row['date']
                );

                // array_push($data,$list);
            }
            return $data;
        } else {
            return false;
        }
    }


}