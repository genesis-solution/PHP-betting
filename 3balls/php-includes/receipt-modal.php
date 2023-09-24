<style>
    body.dark .nav.nav-pills li.nav-item button.nav-link.active {
    border-bottom: none;
    background-color: #009688 !important;
    box-shadow: 1px 1px 4px 0 rgba(0, 0, 0, 0.2);
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
                    <p class="mb-0 mt-2" style="font-size:25px;"> Tres.Live </p>
                    <p class="mt-2" style="font-size: 16px; font-weight:none;"> Ticket#:<span id="ticket_number"> </span> </p>
                    <p class="mt-2" style="font-size: 16px; font-weight:none;" id="game_draw"> 8:30AM DRAW </p>

                    <div class="receipt_combi"> 
                        <div class="d-flex justify-content-between align-items-center mx-3 mt-4">
                            <p class="px-1">1st Number </p>
                            <p class="px-1">2nd Number </p>
                            <p class="px-1">3rd Number </p>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <p class="px-1" style="width:100%; font-size: 17px; font-weight:600;" id="first_ball"> </p>
                            <p class="px-1" style="width:100%; font-size: 17px; font-weight:600;" id="second_ball"> </p>
                            <p class="px-1" style="width:100%; font-size: 17px; font-weight:600;" id="third_ball"> </p>
                        </div>
                    </div>
                    
                    <p class="mt-2" style="font-size: 16px; font-weight:none;"> Bet Amount:<span id="ticket_bet_amount"> </span></p>

                    <div class="d-flex justify-content-center">
                        <img src="" id="qr_image" class="img-thumbnail img-responsive qr_code">
                    </div>

                    <p class="px-4" style="width: 100%; font-size: 12px; margin-top: 80px; text-align:left;"> Transaction Time: <span id="ticket_trans_time"> </span></p>
                    
                </div>
            </div>
            <div class="modal-footer">
                <form action="templates/receipt.php" method="GET">
                    <input type="text" class="d-none" name="game_time_ticket" id="game_time_ticket" readonly/> 
                    <input type="text" class="d-none" name="betID" id="betID" readonly/> 
                    <button type="submit" class="mx-2 print_receipt" id="print_receipt"> 
                        Print Receipt 
                        <img src="src/assets/img/print-icon.png" class="print-icon mb-1" alt="print-icon" height="25" width="25">
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>