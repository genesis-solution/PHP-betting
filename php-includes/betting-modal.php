<style>
    body.dark .nav.nav-pills li.nav-item button.nav-link.active {
    border-bottom: none;
    background-color: #009688 !important;
    box-shadow: 1px 1px 4px 0 rgba(0, 0, 0, 0.2);
}
</style>
<div class="modal fade" id="bettingModal" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Betting Form</h5>
                <button type="button" class="btn-close d-flex align-items-center" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:white; font-size:20px;">&times;</span>
                </button>
            </div>
            <div class="modal-body px-2 py-2 px-sm-4 py-sm-4">
                <div class="simple-pill">
                    <input type="text" class="d-none" id="game_time" readonly>
                    <ul class="nav nav-pills mb-2 d-flex justify-content-center gap-2 px-2 py-2 px-sm-3 py-sm-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation" style="width: 31.33%; margin: 0 auto;">
                            
                            <div class="d-flex justify-content-center mb-2"> 
                                <input type="text" class="text-center number-bet" id="betting_input1" value="#" readonly>
                            </div>

                            <button class="nav-link betting-btn " id="betting-btn1" type="button" style="width: 100%;"> 1st # </button>
                        </li>
                        <li class="nav-item" role="presentation" style="width: 31.33%;">
                            <div class="d-flex justify-content-center mb-2"> 
                                <input type="text" class="text-center number-bet" id="betting_input2" value="#" readonly>
                            </div>
                            <button class="nav-link betting-btn" id="betting-btn2" type="button" style="width: 100%;"> 2nd # </button>
                        </li>
                        <li class="nav-item" role="presentation" style="width: 31.33%;">
                            <div class="d-flex justify-content-center mb-2"> 
                                <input type="text" class="text-center number-bet" id="betting_input3" value="#" readonly>
                            </div>
                            <button class="nav-link betting-btn" id="betting-btn3" type="button" style="width: 100%;"> 3rd # </button>
                        </li>

                        <select class="form-select form-select-sm mt-3 mx-1 p-2 text-center" id="combi_type" style="color:white;">
                            <option value="0"> Please Select </option>
                            <option value="Straight Ball"> Straight Ball </option>
                            <option value="Rambolito"> Rambolito </option>
                        </select>

                        <button class="nav-link btn-submit mx-1 mt-2" type="button" id="generate"> LUCKY PICK </button>

                    </ul>

                    <!-- style="display:none !important;" -->
                    <ul class="nav nav-pills mb-2 d-flex justify-content-center gap-2 p-4" id="submit_form">
                        <li class="nav-item" role="presentation" style="width: 60%; margin: 0 auto;">
                            
                            <div class="my-2"> 
                                <p class="text-center" style="color:#e2a03f;" id="modalBalance"> </p>   
                            </div>

                            <div class="d-flex justify-content-center mb-2"> 
                                <input type="number" class="form-control text-center betAmount" min="1" placeHolder="Amount" id="betAmount">
                            </div>

                            <div class="form-floating mb-2">
                                <textarea class="form-control" name="textRemark" placeHolder="" id="remark" style="resize:none; width=100%; height:100px; border:1px solid #4d4d4d;"></textarea>
                                <label for="textRemark" class="textRemark text-muted"> Remarks </label>
                            </div>

                            <span class="error_message_hide" id="err_msg"> </span>

                            <div class="d-flex mb-3">
                                <button type="button" class="nav-link btn_add_bet" id="add_bet"> Add Bet </button>
                                <button type="button" class="d-flex justify-content-center align-items-center gap-1 list_btn" id="betting_list">
                                    <img src="src/assets/img/list_icon.png" class="list_icon" alt="list-icon" height="22" width="22"> 
                                    <span class="badge badge-light" id="bet_list_count" style="background:#cc0000; padding: 3px 5px;"> 0 </span>
                                </button>
                            </div>

                            <button class="nav-link btn-submit" type="button" id="submit"> Submit </button>
                        </li>
                    </ul>
                 
                
                </div>
            </div>
        </div>
    </div>
</div>