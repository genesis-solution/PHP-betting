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

    public function insertBet($userid,$username,$sponsor,$data,$balance_before,$balance_after,$ref){        

        $combinations = $data['bet_combi']['first'].'-'.$data['bet_combi']['second'].'-'.$data['bet_combi']['third'];
        $genTicketNum = explode('-', $ref);
        $finalTicket = $genTicketNum[0].'-'.$userid.'-'.$genTicketNum[1].'-'.$genTicketNum[2];
        
        if(!isset($data['raffleCode'])) {
            $raffleCode = NULL;
        } else {
            $raffleCode = $data['raffleCode'];
        }

        $query = 'INSERT INTO bets (username,sponsor,game_time,1st_ball,2nd_ball,3rd_ball,combinations,combi_type,combi_pick,raffle_code,amount,remark,balance_before_bet,balance_after_bet,bet_area,ticket_number,date_placed) 
                  VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)'; 
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username,$sponsor,$data['betAreaDraw']['game_time'],$data['bet_combi']['first'],$data['bet_combi']['second'],$data['bet_combi']['third'],$combinations,$data['type'],$data['combiPick'],$raffleCode,$data['amount'],$data['remark'],$balance_before,$balance_after,$data['betAreaDraw']['bet_area'],$finalTicket,$this->dateTimeToday]);

        $numRow = $stmt->rowCount();
        
        if(!empty($numRow)) {
            return $this->receipt($username,$data['betAreaDraw']['game_time']);
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
					"combi_type" => $row['combi_type'],
                    "raffle_code" => $row['raffle_code'],
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
	
	public function rePrint($ticketNumber){
        $query = 'SELECT id, username, game_time, 1st_ball, 2nd_ball, 3rd_ball, combi_type, raffle_code, amount, ticket_number, date_placed
                  FROM bets 
                  WHERE ticket_number = ?';

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$ticketNumber]);

        $numRow = $stmt->rowCount();
        
        if(!empty($numRow)) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $ticketInfo[] = array(
                    "bet_id" => $row['id'],
                    "username" => $row['username'],
                    "game_time" => $row['game_time'],
                    "first_ball" => $row['1st_ball'],
                    "second_ball" => $row['2nd_ball'],
                    "third_ball" => $row['3rd_ball'],
					"combi_type" => $row['combi_type'],
                    "raffle_code" => $row['raffle_code'],
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