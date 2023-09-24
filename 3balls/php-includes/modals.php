<style>
    body.dark .nav.nav-pills li.nav-item button.nav-link.active {
    border-bottom: none;
    background-color: #009688 !important;
    box-shadow: 1px 1px 4px 0 rgba(0, 0, 0, 0.2);
}
</style>
<div class="modal fade" id="tabsModal" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="tabsModalLabel">Betting Form</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="simple-pill">
                                                <ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">
                                                    <li class="nav-item" role="presentation" style="width: 33.33%;">
                                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" style="width: 100%;">1st #</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation" style="width: 33.33%;">
                                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" style="width: 100%;">2nd #</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation" style="width: 33.33%;">
                                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" style="width: 100%;">3rd #</button>
                                                    </li>
                                                </ul>
                                                <div class="tab-content" id="pills-tabContent">
                                                    <!-- 1st -->
                                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                                        <input type="text" name="txt" placeholder="Please select your 1st number" class="form-control" required="" id="bet1" style="font-size: 20px;font-weight:bold;text-align:center;color:white;" readonly>
                                                        <div class="widget-content widget-content-area text-center" style="padding-left: 15%;padding-right: 15%;">
                                                            <!--1-->
                                                            <button type="button" class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4" id="1st-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 512"><path fill="currentColor" d="M160 64c0-11.8-6.5-22.6-16.9-28.2s-23-5-32.8 1.6l-96 64C-.5 111.2-4.4 131 5.4 145.8s29.7 18.7 44.4 8.9L96 123.8V416H32c-17.7 0-32 14.3-32 32s14.3 32 32 32h192c17.7 0 32-14.3 32-32s-14.3-32-32-32h-64V64z"/></svg>
                                                            </button>
                                                            <!--2-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="1st-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M142.9 96c-21.5 0-42.2 8.5-57.4 23.8l-30.9 30.8c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l30.9-30.8C67.5 47.3 104.4 32 142.9 32C223 32 288 97 288 177.1c0 38.5-15.3 75.4-42.5 102.6L109.3 416H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l190.9-190.8c15.2-15.2 23.8-35.9 23.8-57.4c0-44.8-36.3-81.1-81.1-81.1z"/></svg>
                                                            </button>
                                                            <!--3-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="1st-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M0 64c0-17.7 14.3-32 32-32h240c13.2 0 25 8.1 29.8 20.4s1.5 26.3-8.2 35.2L162.3 208H184c75.1 0 136 60.9 136 136s-60.9 136-136 136h-78.6C63 480 24.2 456 5.3 418.1l-1.9-3.8c-7.9-15.8-1.5-35 14.3-42.9s35-1.5 42.9 14.3l1.9 3.8c8.1 16.3 24.8 26.5 42.9 26.5H184c39.8 0 72-32.2 72-72s-32.2-72-72-72H80c-13.2 0-25-8.1-29.8-20.4s-1.5-26.3 8.2-35.2L189.7 96H32C14.3 96 0 81.7 0 64z"/></svg>
                                                            </button>
                                                            <!--4-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="1st-4">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 384 512"><path fill="currentColor" d="M189 77.6c7.5-16 .7-35.1-15.3-42.6s-35.1-.7-42.6 15.3L3 322.4c-4.7 9.9-3.9 21.5 1.9 30.8S21 368 32 368h224v80c0 17.7 14.3 32 32 32s32-14.3 32-32v-80h32c17.7 0 32-14.3 32-32s-14.3-32-32-32h-32V160c0-17.7-14.3-32-32-32s-32 14.3-32 32v144H82.4L189 77.6z"/></svg>
                                                            </button>
                                                            <!--5-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="1st-5">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M32.5 58.3C35.3 43.1 48.5 32 64 32h192c17.7 0 32 14.3 32 32s-14.3 32-32 32H90.7L70.3 208H184c75.1 0 136 60.9 136 136s-60.9 136-136 136h-83.5c-39.4 0-75.4-22.3-93-57.5l-4.1-8.2c-7.9-15.8-1.5-35 14.3-42.9s35-1.5 42.9 14.3l4.1 8.2c6.8 13.6 20.6 22.1 35.8 22.1H184c39.8 0 72-32.2 72-72s-32.2-72-72-72H32c-9.5 0-18.5-4.2-24.6-11.5s-8.6-16.9-6.9-26.2l32-176z"/></svg>
                                                            </button>
                                                            <!--6-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="1st-6">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M232.4 84.7c11.4-13.5 9.7-33.7-3.8-45.1s-33.7-9.7-45.1 3.8L38.6 214.7C14.7 242.9 1.1 278.4.1 315.2c0 1.4-.1 2.9-.1 4.3v.5c0 88.4 71.6 160 160 160s160-71.6 160-160c0-85.5-67.1-155.4-151.5-159.8l63.9-75.6zM256 320a96 96 0 1 1-192 0a96 96 0 1 1 192 0z"/></svg>
                                                            </button>
                                                            <!--7-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="1st-7">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M0 64c0-17.7 14.3-32 32-32h256c11.5 0 22 6.1 27.7 16.1s5.7 22.2-.1 32.1l-224 384c-8.9 15.3-28.5 20.4-43.8 11.5s-20.4-28.5-11.5-43.8L232.3 96H32C14.3 96 0 81.7 0 64z"/></svg>
                                                            </button>
                                                            <!--8-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="1st-8">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M304 160c0-70.7-57.3-128-128-128h-32C73.3 32 16 89.3 16 160c0 34.6 13.7 66 36 89c-31.5 23.3-52 60.8-52 103c0 70.7 57.3 128 128 128h64c70.7 0 128-57.3 128-128c0-42.2-20.5-79.7-52-103c22.3-23 36-54.4 36-89zM176.1 288H192c35.3 0 64 28.7 64 64s-28.7 64-64 64h-64c-35.3 0-64-28.7-64-64s28.7-64 64-64h48.1zm0-64H144c-35.3 0-64-28.7-64-64s28.7-64 64-64h32c35.3 0 64 28.7 64 64s-28.6 64-64 64z"/></svg>
                                                            </button>
                                                            <!--9-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="1st-9">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M64 192a96 96 0 1 0 192 0a96 96 0 1 0-192 0zm87.5 159.8C67.1 347.4 0 277.5 0 192C0 103.6 71.6 32 160 32s160 71.6 160 160c0 2.6-.1 5.3-.2 7.9c-1.7 35.7-15.2 70-38.4 97.4l-145 171.4c-11.4 13.5-31.6 15.2-45.1 3.8s-15.2-31.6-3.8-45.1l63.9-75.6z"/></svg>
                                                            </button>
                                                        </div>

                                                    </div>
                                                    <!-- 2nd -->
                                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                                        <input type="text" name="txt" placeholder="Please select your 2nd number" class="form-control" required="" id="bet2" style="font-size: 20px;font-weight:bold;text-align: center;color:white;" readonly>
                                                        <div class="widget-content widget-content-area text-center" style="padding-left: 15%;padding-right: 15%;">
                                                            <!--1-->
                                                            <button type="button" class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4" id="2nd-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 512"><path fill="currentColor" d="M160 64c0-11.8-6.5-22.6-16.9-28.2s-23-5-32.8 1.6l-96 64C-.5 111.2-4.4 131 5.4 145.8s29.7 18.7 44.4 8.9L96 123.8V416H32c-17.7 0-32 14.3-32 32s14.3 32 32 32h192c17.7 0 32-14.3 32-32s-14.3-32-32-32h-64V64z"/></svg>
                                                            </button>
                                                            <!--2-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="2nd-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M142.9 96c-21.5 0-42.2 8.5-57.4 23.8l-30.9 30.8c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l30.9-30.8C67.5 47.3 104.4 32 142.9 32C223 32 288 97 288 177.1c0 38.5-15.3 75.4-42.5 102.6L109.3 416H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l190.9-190.8c15.2-15.2 23.8-35.9 23.8-57.4c0-44.8-36.3-81.1-81.1-81.1z"/></svg>
                                                            </button>
                                                            <!--3-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="2nd-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M0 64c0-17.7 14.3-32 32-32h240c13.2 0 25 8.1 29.8 20.4s1.5 26.3-8.2 35.2L162.3 208H184c75.1 0 136 60.9 136 136s-60.9 136-136 136h-78.6C63 480 24.2 456 5.3 418.1l-1.9-3.8c-7.9-15.8-1.5-35 14.3-42.9s35-1.5 42.9 14.3l1.9 3.8c8.1 16.3 24.8 26.5 42.9 26.5H184c39.8 0 72-32.2 72-72s-32.2-72-72-72H80c-13.2 0-25-8.1-29.8-20.4s-1.5-26.3 8.2-35.2L189.7 96H32C14.3 96 0 81.7 0 64z"/></svg>
                                                            </button>
                                                            <!--4-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="2nd-4">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 384 512"><path fill="currentColor" d="M189 77.6c7.5-16 .7-35.1-15.3-42.6s-35.1-.7-42.6 15.3L3 322.4c-4.7 9.9-3.9 21.5 1.9 30.8S21 368 32 368h224v80c0 17.7 14.3 32 32 32s32-14.3 32-32v-80h32c17.7 0 32-14.3 32-32s-14.3-32-32-32h-32V160c0-17.7-14.3-32-32-32s-32 14.3-32 32v144H82.4L189 77.6z"/></svg>
                                                            </button>
                                                            <!--5-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="2nd-5">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M32.5 58.3C35.3 43.1 48.5 32 64 32h192c17.7 0 32 14.3 32 32s-14.3 32-32 32H90.7L70.3 208H184c75.1 0 136 60.9 136 136s-60.9 136-136 136h-83.5c-39.4 0-75.4-22.3-93-57.5l-4.1-8.2c-7.9-15.8-1.5-35 14.3-42.9s35-1.5 42.9 14.3l4.1 8.2c6.8 13.6 20.6 22.1 35.8 22.1H184c39.8 0 72-32.2 72-72s-32.2-72-72-72H32c-9.5 0-18.5-4.2-24.6-11.5s-8.6-16.9-6.9-26.2l32-176z"/></svg>
                                                            </button>
                                                            <!--6-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="2nd-6">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M232.4 84.7c11.4-13.5 9.7-33.7-3.8-45.1s-33.7-9.7-45.1 3.8L38.6 214.7C14.7 242.9 1.1 278.4.1 315.2c0 1.4-.1 2.9-.1 4.3v.5c0 88.4 71.6 160 160 160s160-71.6 160-160c0-85.5-67.1-155.4-151.5-159.8l63.9-75.6zM256 320a96 96 0 1 1-192 0a96 96 0 1 1 192 0z"/></svg>
                                                            </button>
                                                            <!--7-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="2nd-7">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M0 64c0-17.7 14.3-32 32-32h256c11.5 0 22 6.1 27.7 16.1s5.7 22.2-.1 32.1l-224 384c-8.9 15.3-28.5 20.4-43.8 11.5s-20.4-28.5-11.5-43.8L232.3 96H32C14.3 96 0 81.7 0 64z"/></svg>
                                                            </button>
                                                            <!--8-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="2nd-8">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M304 160c0-70.7-57.3-128-128-128h-32C73.3 32 16 89.3 16 160c0 34.6 13.7 66 36 89c-31.5 23.3-52 60.8-52 103c0 70.7 57.3 128 128 128h64c70.7 0 128-57.3 128-128c0-42.2-20.5-79.7-52-103c22.3-23 36-54.4 36-89zM176.1 288H192c35.3 0 64 28.7 64 64s-28.7 64-64 64h-64c-35.3 0-64-28.7-64-64s28.7-64 64-64h48.1zm0-64H144c-35.3 0-64-28.7-64-64s28.7-64 64-64h32c35.3 0 64 28.7 64 64s-28.6 64-64 64z"/></svg>
                                                            </button>
                                                            <!--9-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="2nd-9">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M64 192a96 96 0 1 0 192 0a96 96 0 1 0-192 0zm87.5 159.8C67.1 347.4 0 277.5 0 192C0 103.6 71.6 32 160 32s160 71.6 160 160c0 2.6-.1 5.3-.2 7.9c-1.7 35.7-15.2 70-38.4 97.4l-145 171.4c-11.4 13.5-31.6 15.2-45.1 3.8s-15.2-31.6-3.8-45.1l63.9-75.6z"/></svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- 3rd -->
                                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                                                        <input type="text" name="txt" placeholder="Please select your 3rd number" class="form-control" required="" id="bet3" style="font-size: 20px;font-weight:bold;text-align: center;color:white;" readonly>
                                                        <div class="widget-content widget-content-area text-center" style="padding-left: 15%;padding-right: 15%;">
                                                            <!--1-->
                                                            <button type="button" class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4" id="3rd-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 512"><path fill="currentColor" d="M160 64c0-11.8-6.5-22.6-16.9-28.2s-23-5-32.8 1.6l-96 64C-.5 111.2-4.4 131 5.4 145.8s29.7 18.7 44.4 8.9L96 123.8V416H32c-17.7 0-32 14.3-32 32s14.3 32 32 32h192c17.7 0 32-14.3 32-32s-14.3-32-32-32h-64V64z"/></svg>
                                                            </button>
                                                            <!--2-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="3rd-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M142.9 96c-21.5 0-42.2 8.5-57.4 23.8l-30.9 30.8c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l30.9-30.8C67.5 47.3 104.4 32 142.9 32C223 32 288 97 288 177.1c0 38.5-15.3 75.4-42.5 102.6L109.3 416H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l190.9-190.8c15.2-15.2 23.8-35.9 23.8-57.4c0-44.8-36.3-81.1-81.1-81.1z"/></svg>
                                                            </button>
                                                            <!--3-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="3rd-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M0 64c0-17.7 14.3-32 32-32h240c13.2 0 25 8.1 29.8 20.4s1.5 26.3-8.2 35.2L162.3 208H184c75.1 0 136 60.9 136 136s-60.9 136-136 136h-78.6C63 480 24.2 456 5.3 418.1l-1.9-3.8c-7.9-15.8-1.5-35 14.3-42.9s35-1.5 42.9 14.3l1.9 3.8c8.1 16.3 24.8 26.5 42.9 26.5H184c39.8 0 72-32.2 72-72s-32.2-72-72-72H80c-13.2 0-25-8.1-29.8-20.4s-1.5-26.3 8.2-35.2L189.7 96H32C14.3 96 0 81.7 0 64z"/></svg>
                                                            </button>
                                                            <!--4-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="3rd-4">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 384 512"><path fill="currentColor" d="M189 77.6c7.5-16 .7-35.1-15.3-42.6s-35.1-.7-42.6 15.3L3 322.4c-4.7 9.9-3.9 21.5 1.9 30.8S21 368 32 368h224v80c0 17.7 14.3 32 32 32s32-14.3 32-32v-80h32c17.7 0 32-14.3 32-32s-14.3-32-32-32h-32V160c0-17.7-14.3-32-32-32s-32 14.3-32 32v144H82.4L189 77.6z"/></svg>
                                                            </button>
                                                            <!--5-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="3rd-5">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M32.5 58.3C35.3 43.1 48.5 32 64 32h192c17.7 0 32 14.3 32 32s-14.3 32-32 32H90.7L70.3 208H184c75.1 0 136 60.9 136 136s-60.9 136-136 136h-83.5c-39.4 0-75.4-22.3-93-57.5l-4.1-8.2c-7.9-15.8-1.5-35 14.3-42.9s35-1.5 42.9 14.3l4.1 8.2c6.8 13.6 20.6 22.1 35.8 22.1H184c39.8 0 72-32.2 72-72s-32.2-72-72-72H32c-9.5 0-18.5-4.2-24.6-11.5s-8.6-16.9-6.9-26.2l32-176z"/></svg>
                                                            </button>
                                                            <!--6-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="3rd-6">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M232.4 84.7c11.4-13.5 9.7-33.7-3.8-45.1s-33.7-9.7-45.1 3.8L38.6 214.7C14.7 242.9 1.1 278.4.1 315.2c0 1.4-.1 2.9-.1 4.3v.5c0 88.4 71.6 160 160 160s160-71.6 160-160c0-85.5-67.1-155.4-151.5-159.8l63.9-75.6zM256 320a96 96 0 1 1-192 0a96 96 0 1 1 192 0z"/></svg>
                                                            </button>
                                                            <!--7-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="3rd-7">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M0 64c0-17.7 14.3-32 32-32h256c11.5 0 22 6.1 27.7 16.1s5.7 22.2-.1 32.1l-224 384c-8.9 15.3-28.5 20.4-43.8 11.5s-20.4-28.5-11.5-43.8L232.3 96H32C14.3 96 0 81.7 0 64z"/></svg>
                                                            </button>
                                                            <!--8-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="3rd-8">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M304 160c0-70.7-57.3-128-128-128h-32C73.3 32 16 89.3 16 160c0 34.6 13.7 66 36 89c-31.5 23.3-52 60.8-52 103c0 70.7 57.3 128 128 128h64c70.7 0 128-57.3 128-128c0-42.2-20.5-79.7-52-103c22.3-23 36-54.4 36-89zM176.1 288H192c35.3 0 64 28.7 64 64s-28.7 64-64 64h-64c-35.3 0-64-28.7-64-64s28.7-64 64-64h48.1zm0-64H144c-35.3 0-64-28.7-64-64s28.7-64 64-64h32c35.3 0 64 28.7 64 64s-28.6 64-64 64z"/></svg>
                                                            </button>
                                                            <!--9-->
                                                            <button class="btn btn-primary _no--effects position-relative btn-icon btn-rounded mb-2 me-4"  id="3rd-9">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M64 192a96 96 0 1 0 192 0a96 96 0 1 0-192 0zm87.5 159.8C67.1 347.4 0 277.5 0 192C0 103.6 71.6 32 160 32s160 71.6 160 160c0 2.6-.1 5.3-.2 7.9c-1.7 35.7-15.2 70-38.4 97.4l-145 171.4c-11.4 13.5-31.6 15.2-45.1 3.8s-15.2-31.6-3.8-45.1l63.9-75.6z"/></svg>
                                                            </button>
                                                        </div>
                                                        <input type="number" name="txt" placeholder="Place bet amount" class="form-control" required="" id="bet_amount" style="font-size: 20px;font-weight:bold;text-align: center;color:white;">
                                                        <div style="text-align:center;margin-top:20px;">
                                                            <button type="button" class="btn btn-success mb-2 me-4 _effect--ripple waves-effect waves-light" id="bet">SUBMIT BET</button>
                                                            </div>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>