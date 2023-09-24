<style>
    body.dark .nav.nav-pills li.nav-item button.nav-link.active {
    border-bottom: none;
    background-color: #009688 !important;
    box-shadow: 1px 1px 4px 0 rgba(0, 0, 0, 0.2);
}
</style>
<div class="modal fade" id="bettingListModal" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Betting List</h5>
                <button type="button" class="btn-close d-flex align-items-center" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:white; font-size:20px;">&times;</span>
                </button>
            </div>
            <div class="modal-body px-2 py-2 px-sm-4 py-sm-4">
            
            <div class="table-responsive">
                <table class="table betting_list_table" id="betting_list_table">
                    <thead>
                        <tr>
                            <th scope="col"> # </th>
                            <th scope="col"> Combination </th>
                            <th scope="col"> Type </th>
                            <th scope="col"> Amount </th>
                            <th scope="col"> Remark </th>
                            <th scope="col"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            </div>
        </div>
    </div>
</div>