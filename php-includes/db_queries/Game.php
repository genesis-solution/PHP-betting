<?php

class Game {

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function status(){
        $query = 'SELECT * FROM game_status'; 
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $numRow = $stmt->rowCount();
        
        $game = array();
        if(!empty($numRow)) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $list = array(
                    "game_status" => $row['game_status'],
                    "game_time" => $row['game_time'],
                );
                array_push($game,$list);
            }

            return $game;
        } else {
            return false;
        }
    }

    public function resultToday(){
        $query = 'SELECT game_time, status, result, CAST(date_placed AS DATE) as date FROM bets
                  WHERE status = ? AND result != "" AND CAST(date_placed AS DATE) = CURDATE() 
                  GROUP BY CAST(date_placed AS DATE), game_time';

        $stmt = $this->conn->prepare($query);
        $stmt->execute(['Closed']);

        $numRow = $stmt->rowCount();
        
        $game = array();
        if(!empty($numRow)) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $list = array(
                    "game_time" => $row['game_time'],
                    "status" => $row['status'],
                    "result" => $row['result'],
                    "date" => $row['date'],
                );
                array_push($game,$list);
            }

            return $game;
        } else {
            return false;
        }
    }
	
	public function totalBet($username){
        $query = 'SELECT game_time, sum(amount) as total_bet
                  FROM bets 
				  WHERE username = ? AND CAST(date_placed AS DATE) = CURDATE()
                  GROUP BY CAST(date_placed AS DATE), game_time';

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username]);

        $numRow = $stmt->rowCount();
        
        $game = array();
        if(!empty($numRow)) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $list = array(
                    "game_time" => $row['game_time'],
                    "total_bet" => $row['total_bet'],
                );
                array_push($game,$list);
            }

            return $game;
        } else {
            return false;
        }
    }

    public function transHistory($username){
        $query = 'SELECT id, game_time, 1st_ball, 2nd_ball, 3rd_ball, amount, combi_type, status, ticket_number, CAST(date_placed AS DATE) as date FROM bets 
                  WHERE username = ?
                  ORDER BY id DESC LIMIT 10'; 
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username]);

        $numRow = $stmt->rowCount();
        
        $game = array();
        if(!empty($numRow)) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $list = array(
                    "game_time" => $row['game_time'],
                    "first_ball" => $row['1st_ball'],
                    "second_ball" => $row['2nd_ball'],
                    "third_ball" => $row['3rd_ball'],
					"amount" => $row['amount'],
					"combi_type" => $row['combi_type'],
                    "status" => $row['status'],
					"ticket_number" => $row['ticket_number'],
                    "game_date" => $row['date'],
                );
                array_push($game,$list);
            }

            return $game;
        } else {
            return false;
        }
    }

    public function gameHistory(){
        $query = 'SELECT id, draw_time, combinations, CAST(date_declared AS DATE) as date 
                  FROM game_history 
                  ORDER BY id DESC'; 
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $numRow = $stmt->rowCount();
        
        $game = array();
        if(!empty($numRow)) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $list = array(
                    "draw_time" => $row['draw_time'],
                    "combinations" => $row['combinations'],
                    "date_declared" => $row['date'],
                );
                array_push($game,$list);
            }

            return $game;
        } else {
            return false;
        }
    }
	
	public function betLimiter(){
        $query = 'SELECT sum(amount) as betting_gross 
                  FROM bets
                  WHERE status = ?'; 
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['Open']);

        $numRow = $stmt->rowCount();
        
        $game = array();
        if(!empty($numRow)) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $gross = $row['betting_gross'];
            }

            return $gross;
        } else {
            return false;
        }
    }

}