<?php 

    include_once('../PDOConnection.php');
    include_once('../db_queries/Account.php');
    session_start();

    $database = new Database();
    $db = $database->connect();

    $account = new Account($db);

    $username = $_SESSION['username'];

    if(isset($_GET['userBalance']) && $_GET['userBalance'] === "jueteng_userBalance") {

        try {   
            $user = $account->user($username);

            if(!$user) {
                throw new Exception("user_not_exist");
            } else {
                echo json_encode(array('data' => $user['wallet']));
            }

        } catch (\Throwable $th) {
            echo json_encode(array('error' => $th->getMessage()));
        }    

    } else {
        echo json_encode(array('data' => "Invalid Method!"));
    }