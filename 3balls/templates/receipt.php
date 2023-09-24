<?php 
    require "../vendor/autoload.php";
    require('../src/assets/fpdf186/fpdf.php');    
    
    include_once('../php-includes/PDOConnection.php');
    include_once('../php-includes/db_queries/Player.php');

    use Endroid\QrCode\QrCode;
    use Endroid\QrCode\Writer\PngWriter;

    $text = 'http://localhost/jueteng.live/betting-history?ref='.$_GET["betID"];

    $qr_code = QrCode::create($text);
    $writer = new PngWriter;
    $result = $writer->write($qr_code);

    // Note:
    // header('Content-Type: ', $result->getMimeType());
    // echo $result->getString();
    // $result->saveToFile('qr_codes_upload/qr-code.png');

    $database = new Database();
    $db = $database->connect();
    session_start();
    $username = $_SESSION['username'];

    $result->saveToFile('qr_codes_upload/qr-'.$username.'.png');

    $player = new Player($db);

    if(isset($_GET['game_time_ticket'])) {
        $ticketInfo = $player->receipt($username,$_GET['game_time_ticket']);  
        $transTime = explode(" ", $ticketInfo['date']);

        class PDF extends FPDF
        {

            function Header()
            {
                $this->SetFont('Courier','B',12);
                $this->Cell(56,5,'Tres.Live',0,0,'C');
                $this->Ln(5);
            }

            function Footer()
            {
                $this->SetY(-8);
                $this->SetFont('Courier','',5);
                $this->Cell(36.5,5,'Transaction Time: '.$this->transTime,0,0,'C');

            }

            public function setTransTime($transTime){
                $this->transTime = $transTime;
            }
        }
        
        
        $pdf = new PDF('P','mm',array(76.2,58));
        $pdf->AliasNbPages();
        $pdf->SetMargins(1,5,1);
        $pdf->AddPage();

        $pdf->SetFont('Courier','',6);
        $pdf->Cell(56,5,'Ticket#: '.$ticketInfo['ticket_number'],0,0,'C');
        $pdf->Ln(4);

        if($ticketInfo['game_time'] === "Morning") {
            $pdf->Cell(56,5,'8:30AM DRAW',0,0,'C');
        } else if($ticketInfo['game_time'] === "Afternoon") {
            $pdf->Cell(56,5,'3:30PM DRAW',0,0,'C');
        } else if($ticketInfo['game_time'] === "Evening") {
            $pdf->Cell(56,5,'8:30PM DRAW',0,0,'C');
        } 

        $pdf->Ln(4);
        $pdf->SetFont('Courier','',5);
        $pdf->Cell(18.7,5,'1st Number',0,0,'C');
        $pdf->Cell(18.7,5,'2nd Number',0,0,'C');
        $pdf->Cell(18.7,5,'3rd Number',0,0,'C');
        
        $pdf->Ln(3);
        $pdf->SetFont('Courier','B',7);
        $pdf->Cell(18.7,5,$ticketInfo['first_ball'],0,0,'C');
        $pdf->Cell(18.7,5,$ticketInfo['second_ball'],0,0,'C');
        $pdf->Cell(18.7,5,$ticketInfo['third_ball'],0,0,'C');

        $pdf->Ln(7);
        $pdf->SetFont('Courier','',6);
        $pdf->Cell(56,5,'Bet Amount: '.sprintf('%0.2f', $ticketInfo['amount']),0,0,'C');

        $pdf->Ln(7);
        $pdf->SetFont('Courier','',10);
        $pdf->Cell(17.7,20,'',0,0,'C');

        $pdf->Image('http://localhost/jueteng.live/templates/qr_codes_upload/qr-'.$username.'.png', 22,35, 15, 15, 'PNG');

        $pdf->Cell(17.7,20,'',0,0,'C');
        $pdf->setTransTime($transTime[1]);
        $pdf->Output();
    }
    
?>