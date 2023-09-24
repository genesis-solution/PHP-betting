<?php
    if(isset($_GET['ticket_number'])) {
        $ticketNumber = $_GET['ticket_number'];
    } else {
        $ticketNumber = "";
    }
?>

<!DOCTYPE html>
<html lang="en" style="width: 58mm">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> STL | Ticket</title>

        <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        
    </head>

    <style> 
        
        * {
            font-size: 9px;
            font-family: "Nunito", sans-serif;
        }


        

        .btnPrint {
            border: 1px solid #00334d;
            font-weight: 600;
            font-size: 11px;
            margin-top: 70px;
        }

        .btnPrint:hover {
            background: #004466;
            color: #ffffff;
        }

        @media print {
			
            .btnPrint,
            .btnPrint * {
                display: none !important;
            }
            html, body {
                /*changing width to 100% causes huge overflow and wrap*/
				height:100%;
				width:auto !important;
                overflow: hidden;
                background: #FFF; 
				margin: 0 auto;
				
            }
        }
		#invoice-POS{
            left: calc(50% - 44mm);
            position: fixed;
            overflow: visible;
            -moz-transform-origin: top left;
            -ms-transform-origin: top left;
            -o-transform-origin: top left;
            -webkit-transform-origin: top left;
            transform-origin: top left;
            -moz-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
			padding:2mm;
			margin: 0 auto;
			width: 44mm;
            min-width: 43mm;
			background: #FFF;
			::selection {background: #f31544; color: #FFF;}
			::moz-selection {background: #f31544; color: #FFF;} 
		}
    </style>

    <body style="overflow-x: visible;white-space: nowrap;">
        <div class="ticket" id="invoice-POS">
            <div>

                <img  src="https://www.manilatimes.net/manilatimes/uploads/images/2021/08/28/13924.png" style="height:50px;">
				
                <p class="mb-0 mt-2" style="font-size:10px;">PCSO STL - SWER3/3D RESULT</p>
                
				<input type="text" class="d-none" id="tnRef" value="<?= $ticketNumber?>">
                <div class="d-flex"> 
                    <p class="mb-0" style="width: 80px; font-size: 10px; text-align:left;" id="wrapper_trans_time"> 
                        D: <span style="font-size:10px;" id="ticket_trans_date"> </span>
                    </p>
                    <p class="mb-0" style="width: 80px; font-size: 10px; text-align:left;" id="wrapper_trans_time"> 
                        T: <span style="font-size:10px;" id="ticket_trans_time"> </span>
                    </p>
                </div>
                
                <p class="mb-0" style="font-size: 9px; font-weight:none;"> 
                    REF#: <span style="font-size: 10px; font-weight:bold;" id="ticket_number"> </span> 
                </p>

                <p class="mb-0" style="font-size: 10px;line-height: normal; font-weight:none;" id="game_draw"> </p>


                <table class="mt-2" id="ticket_table">
                    
                    <tbody>  
                    </tbody>
                    
                </table>
                

                <p class="mb-0 mt-2" style="font-size: 11px; font-weight:bold;"> 
                    PHP <span style="font-size: 12px;" id="total_amount"> </span> 
                </p>
				<p class="mb-0 mt-2" style="font-size: 10px;line-height: normal;"> 
                    1/450 Straight 1 Comm<br>
					1/150 Rambolito 3 Comm<br>
					1/75 Rambolito 6 Comm
                </p>
                <p class="mb-0 mt-2" style="font-size: 10px;line-height: normal;"> 
                     GABRIONE GAMES, INC. <br> 
                     Province of Negros Oriental <br>
                    (PCSO Authorized Agent Corp.)
                </p>

                <p class="mb-0 mt-2" style="font-size: 12px;font-weight:bold;" id="kiosk"> 
                </p>
				
				<!---<div id="raffle_code" style="margin-bottom:10px;"> </div>--->

                 <div class="d-flex justify-content-start" >
                    <img src="" id="qr_image" class="img-thumbnail img-responsive" style="height:80px;margin-bottom:10px;">
                </div>

                <!-- <p class="px-4 mb-0" style="width: 100%; font-size:9px; margin-top: 35px; text-align:left;" id="wrapper_raffle_code"> Raffle Code: <span style="font-size:9px;" id="raffle_code"> </span></p> -->
            </div>
          
            <button type="button" id="btnPrint" class="form-control btnPrint">
                Print Receipt
                <img src="../src/assets/img/print-icon.png" class="mb-1" alt="print-icon" height="15" width="15">
            </button>

        </div>
    </body>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
	
	<script src="../php-includes/js/apiRequest.js"></script>
    <script>

        resizeView()

        $(window).resize(function() {

            resizeView()

        });

        function resizeView() {
            var width = document.getElementById('invoice-POS').offsetWidth;
            var height = document.getElementById('invoice-POS').offsetHeight + 100;


            var windowWidth = $(document).outerWidth();
            var windowHeight = $(document).outerHeight();
            var r = 1;
            r = Math.min(windowWidth / width, windowHeight / height)

            $('#invoice-POS').css({
                '-webkit-transform': 'scale(' + r + ')',
                '-moz-transform': 'scale(' + r + ')',
                '-ms-transform': 'scale(' + r + ')',
                '-o-transform': 'scale(' + r + ')',
                'transform': 'scale(' + r + ')'
            });
        }


            let rePrintUrl = "";
            let ticketInfo = "";
            
            const tnRef = $('#tnRef').val();
            
            if(tnRef !== "") {
            
                const res = APIRequest(
                    "../php-includes/api/api_reprint.php",
                    "GET",
                    {
                        rePrintReceipt: "pick3_rePrintReceipt",
                        ticket_number: tnRef
                    }
                );

                res.then(function (response) {
                    const res = JSON.parse(response);

                    rePrintUrl = `https://kiosk.swer3.live/templates/rePrint.php?ticket_number=${tnRef}`;
                    localStorage.setItem('receipt', JSON.stringify(res.data));
					
					loadTicket();
				});

            } 

		function loadTicket() {
            ticketInfo = JSON.parse(localStorage.getItem('receipt'));

            let transDateTime = ticketInfo[ticketInfo.length-1].date.split(" ");

            $('#ticket_trans_date').text(transDateTime[0]);
            $('#ticket_trans_time').text(transDateTime[1]);
            $('#ticket_number').text(ticketInfo[ticketInfo.length-1].ticket_number);
            
            if(ticketInfo[ticketInfo.length-1].game_time === "D1") {
                gameDraw = "DRAW 1 (Local)";
            } else if(ticketInfo[ticketInfo.length-1].game_time === "D2") {
                gameDraw = "DRAW 1 (National)";
            } else if(ticketInfo[ticketInfo.length-1].game_time === "D3") {
                gameDraw = "DRAW 2 (Local)";
            } else if(ticketInfo[ticketInfo.length-1].game_time === "D4") {
                gameDraw = "DRAW 2 (National)";
            } else if(ticketInfo[ticketInfo.length-1].game_time === "D5") {
                gameDraw = "DRAW 3 (Local)";
            } else if(ticketInfo[ticketInfo.length-1].game_time === "D6") {
                gameDraw = "DRAW 3 (National)";
            }

            $('#game_draw').text(gameDraw);   

            let betID = "";
            let total = 0;
            for (let i = 0; i < ticketInfo.length; i++) {
				
				if(ticketInfo[i].combi_type === 'Straight Ball') {
                    numCombi = "1comm";
                } else {
                    if(ticketInfo[i].first_ball !== ticketInfo[i].second_ball && ticketInfo[i].second_ball !== ticketInfo[i].third_ball && ticketInfo[i].first_ball !== ticketInfo[i].third_ball) {
                        numCombi = "6comm";
                    } else {
                        numCombi = "3comm";
                    }
                }
				
                $('#ticket_table tbody').append(`
                    <tr>
                        <td>  
                            ${ticketInfo[i].first_ball}${ticketInfo[i].second_ball}${ticketInfo[i].third_ball}
                        </td>
                        
                        <td class="text-end" style="width: 40px;">
                            ${(ticketInfo[i].combi_type === 'Straight Ball') ? 'T' : 'R'}
                        </td>
						
						<td class="text-start" style="width: 65px;">
                            - ${numCombi}
                        </td>

                        <td class="text-start">
                            ${ticketInfo[i].amount.toLocaleString(undefined, { minimumFractionDigits: 2 })}
                        </td>
                    </tr>
                `);
                
                betID += `${ticketInfo[i].bet_id}_`;
                total += parseInt(ticketInfo[i].amount);

                if(ticketInfo[i].raffle_code !== "") {
                    $('#raffle_code').append(`
                        <p class="mb-0" style="font-size: 11px;"> 
                            Raffle Code: ${ticketInfo[i].raffle_code}
                        </p>
                    `);
                }
              
            }

            $('#total_amount').text(`${total}`); 
            $('#kiosk').text(`Kiosk: ${ticketInfo[ticketInfo.length-1].username}`); 

            
            // Note: QR Image
            $('#qr_image').attr('src',`https://chart.googleapis.com/chart?cht=qr&chl=http://swer3.live/qr.php?ticket_num=${ticketInfo[ticketInfo.length-1].ticket_number}&chs=160x160&chld=L|0`);
		
	 };

    let ua = navigator.userAgent.toLowerCase();
    let isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");

    $('#btnPrint').click(function(e) {

        e.preventDefault();
        if (isAndroid) {

            const txt = document.getElementsByTagName('html')[0].innerHTML;
            if (typeof Android !== "undefined")
                Android.showToast(txt);

        } else {
            window.print();
        }
        return false;
    });
		
		
    </script>
</html>