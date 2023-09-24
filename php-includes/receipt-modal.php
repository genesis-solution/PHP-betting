<style>
    body.dark .nav.nav-pills li.nav-item button.nav-link.active {
    border-bottom: none;
    background-color: #009688 !important;
    box-shadow: 1px 1px 4px 0 rgba(0, 0, 0, 0.2);
    }

    .ticket_table > tbody > tr > td {
        border:none !important; 
        text-align:start; 
        color:#000000;
        font-size: 15px;
        padding: 0;
    }

</style>
<div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ticket Receipt</h5>
                <button type="button" class="btn-close d-flex align-items-center" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:white; font-size:20px;">&times;</span>
                </button>
            </div>
            <div class="px-2 py-2 px-sm-4 py-sm-4">

                <div class="receipt_wrapper">
                    <p class="mb-0 mt-2" style="font-size:20px;"> Swertres </p>

                    <div class="d-flex"> 
                        <p class="mb-0" style="width: 150px; font-size: 16px; text-align:left; color:#000000;" id="wrapper_trans_time"> 
                            D:<span style="font-size:15px;" id="ticket_trans_date"> </span>
                        </p>
                        <p class="mb-0" style="width: 150px; font-size: 16px; text-align:left; color:#000000;" id="wrapper_trans_time"> 
                            T:<span style="font-size:15px;" id="ticket_trans_time"> </span>
                        </p>
                    </div>

                    <p class="my-0" style="font-size: 17px; font-weight:none;"> 
                        Ref#:<span id="ticket_number"> </span> 
                    </p>

                    <p class="my-0" style="font-size: 15px; font-weight:none;" id="game_draw"> </p>

                    <table class="mt-2 ticket_table" id="ticket_table">
                        <tbody>  
                        </tbody>
                    </table>

                    <p class="mb-0 mt-2" style="font-size: 17px; font-weight:bold;"> 
                        PHP <span style="font-size: 17px; font-weight:bold;" id="total_amount"> </span> 
                    </p>

                    <p class="mb-0 mt-2" style="font-size: 14px;"> 
                        GABRIONE GAMES, INC. <br> 
                        Province of Negros Oriental <br>
                        (PCSO Authorized Corporation)
                    </p>
                    
                    <!-- <div class="d-flex justify-content-center">
                        <img src="" id="qr_image" class="img-thumbnail img-responsive qr_code"> -->
                        <!-- <img src="https://chart.googleapis.com/chart?cht=qr&chl=http://localhost/jueteng.live/betting-history?ref=${bet_id}&chs=160x160&chld=L|0" id="qr_image" class="img-thumbnail img-responsive qr_code"> -->
                    <!-- </div> -->

                    <!-- <p class="px-4 mb-0" style="width:100%; font-size:12px; margin-top:60px; text-align:left;" id="wrapper_raffle_code"> Raffle Code: <span id="raffle_code"> </span></p> -->
                    
                    <p class="mb-0 mt-2" style="font-size: 14px;" id="kiosk"> </p>
                </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="mx-2 print_receipt" id="print_receipt"> 
                    Print Receipt 
                    <img src="src/assets/img/print-icon.png" class="print-icon mb-1" alt="print-icon" height="25" width="25">
                </button>
            </div>

        </div>
    </div>
</div>