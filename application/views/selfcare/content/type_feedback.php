<?php if(count($feedbacks)>0){?>
<table class="table table-hover table-striped">
    <thead>
        <th>Sr#</th>
        <th>Step</th>
        <th>Type</th>
        <th>Pathway</th>
        <th>Feedback</th>
        <th style="width:150px;">By</th>
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