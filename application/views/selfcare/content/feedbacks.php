  <!-- Page Content -->
  <div class="container mid-container ">
  	    <div class="row" style="background-color:#e9ecef; margin-bottom:10px;">
            <ul class="breadcrumb">
                <li> <a href="<?php echo base_url().'activity'?>">Home</a></li>
                <li style="padding-left:10px"> Category </li>
            </ul>
        </div>
        <div class="row">
            <div  class="col-md-2 offset-md-10" style="margin-bottom:10px;">
                <select class="form-control" id="type">
                    <option value="0"> All </option>
                    <option value="1"> Activity </option>
                    <option value="2"> Feedback </option>
                </select>
            </div>
        </div>
        <div class="row" id="type_content">            
            <?php if(count($feedbacks)>0){?>
            <table class="table table-hover table-striped">
                <thead>
                    <th>Sr#</th>
                    <th>Step</th>
                    <th>Type</th>
                    <th>Pathway</th>
                    <th>Feedback</th>
                    <th>By</th>
                    <th>On </th>
                </thead>

                <?php for($i=0;$i<count($feedbacks);$i++){?>
                <tr>
                    <td><?php echo $i+1;?></td>
                    <td><?php echo $feedbacks[$i]['step'];?></td>
                    <td><?php echo $feedbacks[$i]['step']?'Feedback':'Activity';?></td>
                    <td><?php echo $feedbacks[$i]['pathway'];?></td>
                    <td><?php echo $feedbacks[$i]['feedback'];?></td>
                    <td><?php echo $feedbacks[$i]['user'];?></td>
                    <td><?php echo date('d-M-Y h:i A', strtotime($feedbacks[$i]['created_at']));?></td>
                </tr>
                <?php }?>
            </table>
            <?php }else{?>
                <div class="alert alert-danger col-md-12">
                    <p>No feedbacks have been provided against this pathway yet. </p>
                </div>
            <?php }?>
        </div> <!-- row -->
  </div>  <!-- container -->
  </div>
  <script>
    
  </script>
