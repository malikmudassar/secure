<div class="container mid-container ">


        <div class="col-lg-12">
            <h1 class="pageHeading" style="margin-left:-15px;">Hi! <?php echo $this->session->userdata['name']?></h1> </div>
            
                <p style="margin-top:50px;">
                    Welcome to triage content management. 
                    Here you can edit the content of triage which includes questions, 
                    the answers associated to questions and their values.
                    <br><br>
                    You can also look the preview of triage iteration, give your feedback on each step in feedback section.
                    <br><br>
                    <b>Note:</b> This interface is only for preview it does not send any triage submission to any practice/GP or book any appointment.
                    <br><br>
                </p> 
            <!-- col 12 -->
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url().'selfcare/category'?>" method="post">
                        
                            <div class="form-group" style='margin-bottom:0px !important'>
                                <label>Please select the application</div>
                                <select class="form-control" style="width:500px !important">
                                    <option value="">Dr-IQ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"
                                style="margin-top:16px; margin-left:14px"
                                >Proceed</button>
                            </div>
                        
                    </form> 
                </div>
            </div>
        </div> <!-- row -->
      <!-- container -->


    