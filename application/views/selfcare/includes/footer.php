<div class="footer">
    
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="copyright-d">
                <p>© Dr. iQ 2018. All Rights Reserved</p>
            </div>
        </div>

        <div class="col-md-6">
            <ul class="footer-links">
                <li><a href="https://dr-iq.com/" target="_blank">Dr. iQ Website</a></li>
                                <li><a href="https://app.dr-iq.com/report-a-problem">Report a Problem</a></li>
                
                <li><a href="https://dr-iq.com/contact-us" target="_blank">Contact Us</a></li>
            </ul>
        </div>


    </div>
</div><!--end container -->





<!--start popup model-->

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog notification-model-width">

        <!-- Modal content-->
        <div class="modal-content model-radious">
            <div class="modal-header model-top-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <!-- <h4 class="modal-title">Modal Header</h4> -->
            </div>
            <div class="modal-body notification-popup">
                <p>This feature is coming soon!</p>
            </div>
            <div class="modal-footer model-btm-border text-center">
                <button type="button" class="btn model-submit-btn" data-dismiss="modal">Ok</button>
            </div>
        </div>

    </div>
</div>

<!--end popup model-->


<!--start popup model-->

<div class="modal fade" id="tiles-Modal" role="dialog">
    <div class="modal-dialog notification-model-width">

        <!-- Modal content-->
        <div class="modal-content model-radious">
            <div class="modal-header model-top-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <!-- <h4 class="modal-title">Modal Header</h4> -->
            </div>
            <div class="modal-body notification-popup">
                <p>This feature is coming soon!</p>
            </div>
            <div class="modal-footer model-btm-border text-center">
                <button type="button" class="btn model-submit-btn" data-dismiss="modal">Ok</button>
            </div>
        </div>

    </div>
</div>




<!--end popup model-->




</div>

    <script src="<?php echo ASSET_URL?>assets/dashboard_files/contact.js"></script>
    <script src="<?php echo ASSET_URL?>assets/dashboard_files/jquery_002.js"></script>
    <script src="<?php echo ASSET_URL?>assets/dashboard_files/multiselect.js"></script>
    <script src="<?php echo ASSET_URL?>assets/dashboard_files/jquery-ui.js"></script>
    <script src="<?php echo ASSET_URL?>assets/dashboard_files/bootstrap.js"></script>
    <script src="<?php echo ASSET_URL?>assets/dashboard_files/jquery.js"></script>
    <script>


        $(".clear_notification_link").on('click', function (evt) {
            $('#ClearNotificationModel').modal('show');
            evt.preventDefault();
        });

        $("#ClearNotificationModel").on("shown.bs.modal", function (evt) {
            $('#clearNotificationButtonContainer').on('click','button', $.proxy( notificationConfirmFunc , this ));
        });

        $("#ClearNotificationModel").on("hidden.bs.modal", function (evt) {
            $('#clearNotificationButtonContainer').off('click','button', $.proxy( notificationConfirmFunc , this ));
        });


        function notificationConfirmFunc(evt) {
            var current = $(evt.currentTarget);
            var hostUrl = "https://app.dr-iq.com";
            if(current.data('item') == 'yes'){
                $.ajax({
                    url: hostUrl + '/secure/notifications/clear',
                    dataType: "json",
                    type: 'GET',
                    success: function(response){
                        window.location = hostUrl + '/secure/notifications';
                    }
                });
            }
            $('#ClearNotificationModel').modal('hide');
        }


        $("#checkAll").change(function () {
            $("input:checkbox.cb-element").prop('checked', $(this).prop("checked"));
        });
        $(".cb-element").change(function () {
            _tot = $(".cb-element").length
            _tot_checked = $(".cb-element:checked").length;

            if(_tot != _tot_checked){
                $("#checkAll").prop('checked',false);
            }
        });

        //         $(document).ready(function(){

        //     $(".navbar-nav li a").each(function(){
        //         if($(this).attr("href")==window.location.pathname)
        //             $(this).addClass("active");
        //     })
        // })

        $(function(){
            var current = location.pathname;
            $('#nav li a').each(function(){
                var $this = $(this);
                // if the current path is like this link, make it active
                if($this.attr('href').indexOf(current) !== -1){
                    $this.addClass('active');
                }
            })
        })


        $( function(){
            $( "#datepicker" ).datepicker();
        });

    </script>




</div><iframe style="display: none !important; width: 1px !important; height: 1px !important; opacity: 0 !important; pointer-events: none !important;" name="_hjRemoteVarsFrame" title="_hjRemoteVarsFrame" id="_hjRemoteVarsFrame" src="dashboard_files/rcj-da10bd4908deb9e19dfde013ec3fe4ff.html"></iframe><div id="ads"></div></body></html>