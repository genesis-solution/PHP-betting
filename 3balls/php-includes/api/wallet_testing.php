
<?php 
    // <!-- Note: this is for testing purpose -->

    include_once('../PDOConnection.php');
    include_once('../db_queries/Account.php');
    include_once('../db_queries/Player.php');
    session_start();

    $database = new Database();
    $db = $database->connect();

    $account = new Account($db);
    $player = new Player($db);

    // $username = "ezytres"; // $_SESSION['userid'];
    date_default_timezone_set("Asia/Manila");

    if(isset($_GET['userWallet']) && $_GET['userWallet'] === "api_request_user_wallet") {
        // $data = $_POST['data'];
        // $user = $account->user($username);

        try {   

            $data = $player->wallet($_GET['username']);

            $response = [
                'code' => 'OK',
                'message' =>  'OK',
                'status' => 200,
                'dateTime_request' => date("Y-m-d h:i:sA"),
                'data' => $data
            ]; 

            echo json_encode(array('response' => $response));
            return;

        } catch (\Throwable $th) {
            echo json_encode(array('error' => $th->getMessage()));
        }

    } else {
        echo json_encode(array('data' => "Invalid Method!"));
    }