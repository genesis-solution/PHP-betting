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

        try {   

            $receiptList = array();
            foreach ($data as $index => $item) {
                $user = $account->user($username);

                $newBalance = $user['wallet'] - $item['amount'];
                $inserted = $player->insertBet($user['id'],$user['username'],$user['sponsor'],$item,$user['wallet'],$newBalance,$data['ref']);         
                
                if(!$inserted) {
                    throw new Exception("insert_bet_failed");
                } else {
                    $player->adjustWallet($username,$newBalance);

                    array_push($receiptList,$inserted);
                    if(count($data) - 1 ===  $index + 1) {
                        echo json_encode(array('data' => $receiptList));
                        break;
                    }
                    // echo json_encode(array('data' => 'success'));
                }
            }

        } catch (\Throwable $th) {
            echo json_encode(array('error' => $th->getMessage()));
        }

    

    } else {
        echo json_encode(array('data' => "Invalid Method!"));
    }