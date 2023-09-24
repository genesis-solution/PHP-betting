<?php 

    include_once('../PDOConnection.php');
    include_once('../db_queries/Game.php');

    $database = new Database();
    $db = $database->connect();

    $game = new Game($db);

    if(isset($_GET['gameStatus']) && $_GET['gameStatus'] === "jueteng_gameStatus") {

        try {   
            $gameStatus = $game->status();
            if(!$gameStatus) {
                throw new Exception("game_status_failed");
            } else {
                echo json_encode(array('data' => $gameStatus));
            }

        } catch (\Throwable $th) {
            echo json_encode(array('error' => $th->getMessage()));
        }    

    } else {
        echo json_encode(array('data' => "Invalid Method!"));
    }