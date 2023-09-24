<!DOCTYPE html>
<html lang="en">
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

        .ticket {
            /* border: 1px solid red; */
            width: 60mm;
            max-width: 60mm;
            height: 100%;
            padding: 5px;
            text-align: start;
        }
        
        /* .qr_code {
            max-width: 60px !important;
            margin: 0 20px !important;
        } */

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
				width:180px !important;
                overflow: hidden;
                background: #FFF; 
            }
        }
    </style>

    <body>
        <div class="ticket">
            <div>

                <img  src="https://www.manilatimes.net/manilatimes/uploads/images/2021/08/28/13924.png" style="height:50px;">

                <p class="mb-0 mt-2" style="font-size:12px;">PCSO STL - SWER3/3D RESULT</p>
                
                <div class="d-flex"> 
                    <p class="mb-0" style="width: 80px; font-size: 12px; text-align:left;" id="wrapper_trans_time"> 
                        D: <span style="font-size:12px;" id="ticket_trans_date"> </span>
                    </p>
                    <p class="mb-0" style="width: 80px; font-size: 12px; text-align:left;" id="wrapper_trans_time"> 
                        T: <span style="font-size:12px;" id="ticket_trans_time"> </span>
                    </p>
                </div>
                
                <p class="mb-0" style="font-size: 9px; font-weight:none;"> 
                    REF#: <span style="font-size: 12px; font-weight:bold;" id="ticket_number"> </span> 
                </p>

                <p class="mb-0" style="font-size: 12px; font-weight:none;" id="game_draw"> </p>


                <table class="mt-2" id="ticket_table">
                    
                    <tbody>  
                    </tbody>
                    
                </table>
                

                <p class="mb-0 mt-2" style="font-size: 15px; font-weight:bold;"> 
                    PHP <span style="font-size: 12px;" id="total_amount"> </span> 
                </p>
				<p class="mb-0 mt-2" style="font-size: 11px; font-weight:bold;"> 
                    T WIN 450
					
                </p>
				<p class="mb-0 mt-2" style="font-size: 11px; font-weight:bold;margin-bottom:10px;"> 
                    R WIN 75/150
                </p>

                <p class="mb-0 mt-2" style="font-size: 11px;"> 
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

    <script> 
       // $(document).ready(function () {  
            const ticketInfo = JSON.parse(localStorage.getItem('receipt'));

            let transDateTime = ticketInfo[ticketInfo.length-1].date.split(" ");

            $('#ticket_trans_date').text(transDateTime[0]);
            $('#ticket_trans_time').text(transDateTime[1]);
            $('#ticket_number').text(ticketInfo[ticketInfo.length-1].ticket_number);
            
			if(ticketInfo[ticketInfo.length-1].game_time === "D1") {
                gameDraw = "DRAW 1 10:30AM (Local)";
            } else if(ticketInfo[ticketInfo.length-1].game_time === "D2") {
                gameDraw = "DRAW 1 02:00PM (National)";
            } else if(ticketInfo[ticketInfo.length-1].game_time === "D3") {
                gameDraw = "DRAW 2 03:00PM (Local)";
            } else if(ticketInfo[ticketInfo.length-1].game_time === "D4") {
                gameDraw = "DRAW 2 05:00PM (National)";
            } else if(ticketInfo[ticketInfo.length-1].game_time === "D5") {
                gameDraw = "DRAW 3 07:00PM (Local)";
            } else if(ticketInfo[ticketInfo.length-1].game_time === "D6") {
                gameDraw = "DRAW 3 09:00PM (National)";
            }

            $('#game_draw').text(gameDraw);   

            let total = 0;
            for (let i = 0; i < ticketInfo.length; i++) {
                $('#ticket_table tbody').append(`
                    <tr>
                        <td style="font-size: 11px;font-weight:bold;">  
                            ${ticketInfo[i].first_ball}${ticketInfo[i].second_ball}${ticketInfo[i].third_ball}
                        </td>
                        
                        <td class="text-center" style="width: 80px;font-size: 11px;font-weight:bold;">
                            ${(ticketInfo[i].combi_type === 'Straight Ball') ? 'T' : 'R'}
                        </td>

                        <td class="text-start" style="font-size: 11px;font-weight:bold;">
                            ${parseInt(ticketInfo[i].amount).toLocaleString(undefined, { minimumFractionDigits: 2 })}
                        </td>
                    </tr>
                `);
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
            $('#kiosk').text(`Device ID: ${ticketInfo[ticketInfo.length-1].username}`); 

            // Note: QR Image
            $('#qr_image').attr('src',`https://chart.googleapis.com/chart?cht=qr&chl=http://swer3.live/qr.php?ticket_num=${ticketInfo[ticketInfo.length-1].ticket_number}&chs=160x160&chld=L|0`);
            
            // if(raffle_code !== null) {
            //     $('#wrapper_raffle_code').show();
            //     $('#wrapper_trans_time').css({marginTop: '0'});
            //     $('#raffle_code').text(raffle_code);
            // } else {
            //     $('#wrapper_raffle_code').hide();
            //     $('#wrapper_trans_time').css({marginTop: '50px'});
            // }

       // });
		
		let ua = navigator.userAgent.toLowerCase();
		let isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
		 
		$('#btnPrint').click(function(e) {
			e.preventDefault();
			if (isAndroid) {
				// let printWindow = window.open(`https://kiosk.swer3.live/templates/rePrint.php?ticket_number=${ticketInfo[ticketInfo.length-1].ticket_number}`);
				// printWindow.print();
				// history.back();

			} else {
				window.print();
			}
			return false;
		});
		
    </script>
</html>