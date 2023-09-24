<style>
    body.dark .nav.nav-pills li.nav-item button.nav-link.active {
        border-bottom: none;
        background-color: #009688 !important;
        box-shadow: 1px 1px 4px 0 rgba(0, 0, 0, 0.2);
    }

    .local_btn {
        background: #006699;
        padding: 10px;
        border-radius: 5px;
        border: none;
        color: #f2f2f2;
        font-weight: 600;
        width: 100%;
    }

    .local_btn:hover {
        background: #004466;
    }

    .national_btn {
        background: #cc0000;
        padding: 10px;
        border-radius: 5px;
        border: none;
        color: #f2f2f2;
        font-weight: 600;
        width: 100%;
    }

    .national_btn:hover {
        background: #990000;
    }

    .disabled_btn {
        background: #1f1f14;
        padding: 10px;
        border-radius: 5px;
        border: none;
        color: #f2f2f2;
        font-weight: 600;
        width: 100%;    
    }

</style>
<div class="modal fade" id="bettingAreaModal" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Betting Area </h5>
                <button type="button" class="btn-close d-flex align-items-center" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:white; font-size:20px;">&times;</span>
                </button>
            </div>
            <div class="modal-body px-2 py-2 px-sm-4 py-sm-4">
                <div class="d-flex justify-content-center gap-2">
                    <button class="local_btn" type="button" id="local_draw" data-bs-toggle="modal" data-bs-target="#bettingModal"> Swer3 </button>
                    <button class="national_btn" type="button" id="national_draw" data-bs-toggle="modal" data-bs-target="#bettingModal"> 3D </button>
                </div>
            </div>
        </div>
    </div>
</div>