<?php 

    include_once('../PDOConnection.php');
    include_once('../db_queries/Game.php');

    $database = new Database();
    $db = $database->connect();

    $game = new Game($db);

    if(isset($_GET['gameHistory']) && $_GET['gameHistory'] === "jueteng_gameHistory") {

        try { 
            $gameHistory = $game->gameHistory();
            if(!$gameHistory) {
                throw new Exception("no_record_found");
            } else {
                echo json_encode(array('data' => $gameHistory));
            }

        } catch (\Throwable $th) {
            echo json_encode(array('error' => $th->getMessage()));
        }    

    } else {
        echo json_encode(array('data' => "Invalid Method!"));
    }