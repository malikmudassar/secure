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
                <h3 style="margin-bottom: 20px;">Pathway: <?php echo $pathway['name']?></h3>
                <h4 style="margin-bottom: 20px;">Step: <?php echo $step['number']?></h4>
                <?php if($step['type']=='question' || $step['type']=='info'){?>
                <div class="login-form">
                    <form data-toggle="validator" action="" method="post">
                        <div class="form-group">
                            <label>Select Question</label>
                            <select class="form-control" name='question'>
                            <?php
                            $count=count($questions);
                                for($i=0;$i<$count;$i++){
                            ?>
                                <option value="<?php echo $questions[$i]['id']?>"><?php echo substr($questions[$i]['statement'], 0,100)?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                        <input type="hidden" name='step' value="<?php echo $step['id']?>">
                        
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Add </button>
                            <a href="<?php echo base_url().'admin/manage_steps'?>" class="btn btn-warning">Back</a>
                        </div>

                    </form>
                </div>
                <?php }?>
                <?php if($step['type']=='calculation'){?>
                <div class="login-form">
                    <form data-toggle="validator" action="" method="post">
                        <input type="hidden" name="step" value="<?php echo $step['id']?>">
                        <div class="form-group">
                            <label>From step </label>
                            <select class="form-control" name="from_step">
                                <option value="">Select step number </option>
                                <?php foreach($steps as $step){?>
                                    <option value="<?php echo $step['number']?>"><?php echo $step['number']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>To step </label>
                            <select class="form-control" name="to_step">
                                <option value="">Select step number </option>
                                <?php foreach($steps as $step){?>
                                    <option value="<?php echo $step['number']?>"><?php echo $step['number']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Add </button>
                            <a href="<?php echo base_url().'admin/manage_steps'?>" class="btn btn-warning">Back</a>
                        </div>

                    </form>
                </div>
                <?php } elseif($step['type']=='condition'){?>
                <div class="login-form">
                    <form data-toggle="validator" action="" method="post">
                        <input type="hidden" name="step" value="<?php echo $step['id']?>">
                        <div class="form-group">
                            <label>If result of step </label>
                            <select class="form-control" name="step_result">
                                <option value="">Select step number </option>
                                <?php foreach($steps as $step){?>
                                    <option value="<?php echo $step['number']?>"><?php echo $step['number']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>is</label>
                            <select class="form-control" name="operator">
                                <option value=">"> Greater than </option>
                                <option value="<"> Less than </option>
                                <option value="=="> Equals </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>this</label>
                            <input type="text" name="value" class="form-control">
                        </div>
                        <div class="form-group">
                           <input type="checkbox" name="flag" value="red"> Mark red flag
                        </div>
                        <div class="form-group">
                            <label>Then next step </label>
                            <select class="form-control" name="if_next_step">
                                <option value="">Select step number </option>
                                <?php foreach($steps as $step){?>
                                    <option value="<?php echo $step['number']?>"><?php echo $step['number']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Else next step </label>
                            <select class="form-control" name="else_next_step">
                                <option value="">Select step number </option>
                                <?php foreach($steps as $step){?>
                                    <option value="<?php echo $step['number']?>"><?php echo $step['number']?></option>
                                <?php }?>
                            </select>
                        </div>
                         <div class="form-group">
                            <button class="btn btn-primary" type="submit">Add </button>
                            <a href="<?php echo base_url().'admin/manage_steps'?>" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
                <?php }elseif($step['type']=='age'){?>
                    <div class="login-form">
                    <form data-toggle="validator" action="" method="post">
                        <input type="hidden" name="step" value="<?php echo $step['id']?>">
                        <div class="form-group">
                            <label>If </label>
                            <span class="form-control">Age</span>
                        </div>
                        <div class="form-group">
                            <label>is</label>
                            <select class="form-control" name="operator">
                                <option value=">"> Greater than </option>
                                <option value="<"> Less than </option>
                                <option value="=="> Equals </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>this</label>
                            <input type="text" name="value" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Then next step </label>
                            <select class="form-control" name="if_next_step">
                                <option value="">Select step number </option>
                                <?php foreach($steps as $step){?>
                                    <option value="<?php echo $step['number']?>"><?php echo $step['number']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Else next step </label>
                            <select class="form-control" name="else_next_step">
                                <option value="">Select step number </option>
                                <?php foreach($steps as $step){?>
                                    <option value="<?php echo $step['number']?>"><?php echo $step['number']?></option>
                                <?php }?>
                            </select>
                        </div>
                         <div class="form-group">
                            <button class="btn btn-primary" type="submit">Add </button>
                            <a href="<?php echo base_url().'admin/manage_steps'?>" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
                <?php }elseif($step['type']=='flag'){?>
                    <div class="login-form">
                    <form data-toggle="validator" action="" method="post">
                        <input type="hidden" name="step" value="<?php echo $step['id']?>">
                        <div class="form-group">
                            <label>If result of step </label>
                            <select class="form-control" name="step_result">
                                <option value="">Select step number </option>
                                <?php foreach($steps as $step){?>
                                    <option value="<?php echo $step['number']?>"><?php echo $step['number']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>is</label>
                            <select class="form-control" name="operator">
                                <option value=">"> Greater than </option>
                                <option value="<"> Less than </option>
                                <option value="=="> Equals </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>this</label>
                            <input type="text" name="value" class="form-control">
                        </div>
                        <div class="form-group">
                           <input type="checkbox" name="flag" value="red"> Mark red flag
                        </div>
                        <div class="form-group">
                            <label>Then next step </label>
                            <select class="form-control" name="if_next_step">
                                <option value="">Select step number </option>
                                <?php foreach($steps as $step){?>
                                    <option value="<?php echo $step['number']?>"><?php echo $step['number']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Else next step </label>
                            <select class="form-control" name="else_next_step">
                                <option value="">Select step number </option>
                                <?php foreach($steps as $step){?>
                                    <option value="<?php echo $step['number']?>"><?php echo $step['number']?></option>
                                <?php }?>
                            </select>
                        </div>
                         <div class="form-group">
                            <button class="btn btn-primary" type="submit">Add </button>
                            <a href="<?php echo base_url().'admin/manage_steps'?>" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
                <?php }?>
            </div>

        </div>
    </div>
</div>