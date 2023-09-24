<!-- TRANSACTION HISTORY -->
<div class="row px-2">
    <div class="col-12 px-1">
        <div class="d-flex justify-content-between align-items-center py-2 px-3 mt-2 mt-sm-1" style="background: #1f2e2e; border-top-left-radius:5px; border-top-right-radius:5px;">
            <div class="d-flex justify-content-start align-items-center">
                <h4 class="mb-0 trans-title"> Transaction History </h4>
                <img src="src/assets/img/transaction-icon.png" class="transaction-icon" alt="transaction-icon" height="27" width="27"> 
				<p class="mb-0 mx-3" id="total_bets"> </p>
            </div>

            <div class="table_message_hide" id="th_tbl_msg">
                <p class="m-0" style="color: #ff6666; text-shadow: 1px 1px 5px black;"> No record found. </p>
            </div>
            
        </div>
        <div class="table-responsive">
            <table id="trans_table">
                <tbody id="transaction_history">
                </tbody>
            </table>
        </div>

    </div>
</div>  
<!-- TRANSACTION HISTORY END -->
