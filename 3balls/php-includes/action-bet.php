<?php
require('database.php');
include('check-session.php');
$userid = $_SESSION['username'];

$bet1 = $_POST['bet1'];
$bet2 = $_POST['bet2'];
$bet3 = $_POST['bet3'];
$bet_amount = $_POST['bet_amount'];

date_default_timezone_set("Asia/Manila");
$date = date("y-m-d h:i:sa");

$query = mysqli_query($con, "select * from users where username='$userid'");
$result = mysqli_fetch_array($query);
$current_investment =$result['current_investment'];
$current_bal =$result['wallet'];
$sponsor =$result['sponsor'];

$total_bets = mysqli_query($con, "SELECT SUM(amount) AS totalsum FROM bets where combinations = '$bet1 - $bet2 - $bet3' or combinations = '$bet1 - $bet3 - $bet2' or combinations = '$bet2 - $bet1 - $bet3' or combinations = '$bet3 - $bet1 - $bet2' or combinations = '$bet3 - $bet2 - $bet1'");
$sum_bets_result = mysqli_fetch_assoc($total_bets); 
$sum_bets = 100000;

$percentage_1 = 0.58;
$percentage_2 = 0.42;
$percentage_3 = 0.10;
$winning_amount = 450;

$less1 = $sum_bets * $percentage_2;

$less2 = $sum_bets - $less1;

$less3 = $less2 * $percentage_3;

$less4 = $less2 - $less3;

$total = $less4 /$winning_amount;

if($current_bal < $bet_amount){
    echo '<script>Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Insufficient wallet balance.",
        });</script>';
}else{
    $insert_bet = mysqli_query($con,"insert into bets (`username`,`sponsor`,`1st_ball`,`2nd_ball`,`3rd_ball`,`combinations`,`amount`,`commission`,`date_placed`) values('$userid','$sponsor','$bet1','$bet2','$bet3','$bet1 - $bet2 - $bet3','$bet_amount','','$date')");
    $update_user_balance = mysqli_query($con,"update users set wallet = `wallet` - $bet_amount where username = '$userid'");
    if($insert_bet && $update_user_balance){
        echo '<script>Swal.fire({
            icon: "success",
            title: "Success!",
            text: "BET SUCCECSS!",
        }).then(function() {
            window.location.replace("dashboard.php");
            });</script>';
    }else{
        echo '<script>Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Error on placing bet.",
        });</script>';
    }
    
}
?>