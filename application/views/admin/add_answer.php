<div class="layout-content">
    <div class="layout-content-body">
        <div class="col-md-6">
            <div class="login-body">
                <?php if(isset($errors)){?>
                    <div class="alert alert-danger">
                        <?php print_r($errors);?>
                    </div>
                <?php }?>
                <?php if(!empty($this->session->flashdata('success'))){?>
                    <div class="alert alert-success">
                        <?php print_r($this->session->flashdata('success'));?>
                    </div>
                <?php }?>
                <div class="login-form">
                    <form data-toggle="validator" action="" method="post">
                        <div class="form-group">
                            <label for="username" class="control-label">Pathway Name</label>
                            <select class="form-control" name="pathway" id='pw'>
                                <option value="">Select Pathway</option>
                                <?php
                                if(count($pathways)>0) {
                                    for($i=0;$i<count($pathways);$i++)
                                    {?>
                                        <option value="<?php echo $pathways[$i]['id']?>"><?php echo $pathways[$i]['name']?></option>
                                    <?php
                                    }}
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label">Question Statement</label>
                            <div id='questions'>
                                <select class="form-control">
                                    <option value="">Select Question</option>
                                </select>
                            </div>
                        </div>
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