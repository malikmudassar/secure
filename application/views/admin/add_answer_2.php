<div class="layout-content">
    <div class="layout-content-body">
        <div class="col-md-6">
            <div class="login-body">
                <?php if(isset($errors)){?>
                    <div class="alert alert-danger">
                        <?php print_r($errors);?>
                    </div>
                <?php }?>
                <?php if(isset($success)){?>
                    <div class="alert alert-success">
                        <?php print_r($success);?>
                    </div>
                <?php }?>
                <div class="login-form">
                    <form data-toggle="validator" action="<?php echo base_url().'admin/add_answer_2/'.$question?>" method="post">
                        <?php if($ans_model['radio']>0){?>
                        <div class="form-group">
                            <label>Name of Radio Boxes</label>
                            <input type="text" name='name' class="form-control" />
                        </div>
                        <?php for($i=1;$i<=$ans_model['radio'];$i++){?>
                            <div class="form-group">
                                <label>Value Radio <?php echo $i;?></label>
                                <input type="number" class="form-control" name="radio<?php echo $i?>">
                            </div>
                            <div class="form-group">
                                <label>Caption</label>
                                <input type="text" name="radioTxt<?php echo $i?>" class="form-control"/>
                            </div>
                        <?php }?>

                        <?php }?>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"> Add </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('#pw').on('change',function(){
        var p=$('#pw').val();
        $.ajax({
          type:"GET",
          url:"<?php echo base_url()?>admin/getQByPathway/"+p,      
          success:function(result){
            $("#questions").html(result); 
          }
        });
    });
    
});
</script>