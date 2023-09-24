<?php 

    include_once('../PDOConnection.php');
    include_once('../db_queries/Account.php');
    include_once('../db_queries/Player.php');
    session_start();

    $database = new Database();
    $db = $database->connect();

    $account = new Account($db);
    $player = new Player($db);

    $username = $_SESSION['username'];

    if(isset($_POST['insertBet']) && $_POST['insertBet'] === "jueteng_insertBet") {
        $data = $_POST['data'];
        $user = $account->user($username);

        try {   

            $newBalance = $user['wallet'] - $data['amount'];
            $inserted = $player->insertBet($user['id'],$user['username'],$user['sponsor'],$data,$user['wallet'],$newBalance);

            if(!$inserted) {
                throw new Exception("insert_bet_failed");
            } else {
                $player->adjustWallet($username,$newBalance);
                echo json_encode(array('data' => $inserted));
                // echo json_encode(array('data' => 'success'));
            }

        } catch (\Throwable $th) {
            echo json_encode(array('error' => $th->getMessage()));
        }

    

    } else {
        echo json_encode(array('data' => "Invalid Method!"));
    }