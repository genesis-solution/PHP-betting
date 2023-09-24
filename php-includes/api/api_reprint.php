<?php 

    include_once('../PDOConnection.php');
    include_once('../db_queries/Player.php');

    $database = new Database();
    $db = $database->connect();

    $player = new Player($db);

    if(isset($_GET['rePrintReceipt']) && $_GET['rePrintReceipt'] === "pick3_rePrintReceipt") {
        $ticketNumber = $_GET['ticket_number'];

        try {   
            $receipt = $player->rePrint($ticketNumber);

            if(!$receipt) {
                throw new Exception("no_receipt");
            } else {
                echo json_encode(array('data' => $receipt));
            }

        } catch (\Throwable $th) {
            echo json_encode(array('error' => $th->getMessage()));
        }    

    } else {
        echo json_encode(array('data' => "Invalid Method!"));
    }