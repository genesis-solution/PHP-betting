<?php 

    include_once('../PDOConnection.php');
    include_once('../db_queries/Game.php');
    session_start();

    $database = new Database();
    $db = $database->connect();

    $game = new Game($db);

    $username = $_SESSION['username'];

    if(isset($_GET['transHistory']) && $_GET['transHistory'] === "jueteng_transHistory") {

        try {  
            $transHistory = $game->transHistory($username);
            if(!$transHistory) {
                throw new Exception("no_record_found");
            } else {
                echo json_encode(array('data' => $transHistory));
            }

        } catch (\Throwable $th) {
            echo json_encode(array('error' => $th->getMessage()));
        }    

    } else {
        echo json_encode(array('data' => "Invalid Method!"));
    }