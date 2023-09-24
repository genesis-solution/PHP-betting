<?php 

    include_once('../PDOConnection.php');
    include_once('../db_queries/Game.php');
    session_start();

    $database = new Database();
    $db = $database->connect();

    $game = new Game($db);

    if(isset($_GET['betLimiter']) && $_GET['betLimiter'] === "jueteng_betLimiter") {

        try {   
            $gross = $game->betLimiter();

            if(!$gross) {
                throw new Exception("no_bet_found");
            } else {
                echo json_encode(array('data' => $game->betLimiter()));
            }

        } catch (\Throwable $th) {
            echo json_encode(array('error' => $th->getMessage()));
        }    

    } else {
        echo json_encode(array('data' => "Invalid Method!"));
    }