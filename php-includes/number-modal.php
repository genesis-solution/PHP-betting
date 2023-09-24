<style>
    body.dark .nav.nav-pills li.nav-item button.nav-link.active {
    border-bottom: none;
    background-color: #009688 !important;
    box-shadow: 1px 1px 4px 0 rgba(0, 0, 0, 0.2);
}
</style>
<div class="modal fade" id="numberKeyPadModal" tabindex="-1" role="dialog" aria-labelledby="numberKeyPadModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
    
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Number Input </h5>
                <button type="button" class="btn-close d-flex align-items-center" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:white; font-size:20px;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="simple-pill">

                    <div class="row d-flex justify-content-center">
                        <div class="col col-sm-4 d-flex justify-content-center">
                            <input type="button" id="key1" value="1" />
                            <input type="button" id="key2" value="2" />
                            <input type="button" id="key3" value="3" />
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center">
                        <div class="col col-sm-4 d-flex justify-content-center">
                            <input type="button" id="key4" value="4" />
                            <input type="button" id="key5" value="5" />
                            <input type="button" id="key6" value="6" />
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center">
                        <div class="col col-sm-4 d-flex justify-content-center">
                            <input type="button" id="key7" value="7" />
                            <input type="button" id="key8" value="8" />
                            <input type="button" id="key9" value="9" />
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center">
                        <div class="col col-sm-12 d-flex justify-content-center">
                            <input type="button" id="key0" value="0" />   
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
    </div>
</div>