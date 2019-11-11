  <!-- Page Content -->
  <div class="container inner-pg ">
    <div class="row">
        <div class="col-lg-6" style="border:5px solid #005eb8">
            <span style="background-color:#005eb8; line-height:1.5em; display:block; padding:5px; margin-left:-15px;margin-right:-15px; text-align:center; color:white" > <h2> BMI Calculator </h2></span>
            <form action="" method="post"> 
            <p style="font-size:14pt; padding-left:5px;">Use this calculator to check your body mass index (BMI) and find out if you're a healthy weight.</p>
            <div id="feet">
                <div class="form-group" style="padding-right:5px; padding-left:5px;">
                    <span style="font-size:15pt;"><b>Height</b></span>
                    <button type='button' class="btn btn-link pull-right" id='lnkCm'>Switch to cm</button>
                    
                </div>
                <div class="col-md-8" style="padding-left:5px;">
                    <table>
                        <tr>
                            <td>Feet</td>
                            <td>Inches</td>
                        </tr>
                        <tr>
                            <td><input type="number" name="feet" value='0'/></td>
                            <td><input type="number" name="inches" value='0'/></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div id="cm" style="display:none;">
                <div class="form-group" style="padding-right:5px; padding-left:5px;">
                    <span style="font-size:15pt;"><b>Height</b></span>
                    <button type='button' class="btn btn-link pull-right" id='lnkft'>Switch to ft,in</button>

                </div>
                <div class="col-md-8" style="padding-left:5px;">
                    <table>
                        <tr>
                            <td>Centimetres</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="cm" /></td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr>
            <div id="stone">
                <div class="form-group" style="padding-right:5px; padding-left:5px;">
                    <span style="font-size:15pt;"><b>Weight</b></span>
                    <button type='button' class="btn btn-link pull-right" id='lnkst'>Switch to kg</button>

                </div>
                <div class="col-md-8" style="padding-left:5px;">
                    <table>
                        <tr>
                            <td>Stone</td>
                            <td>Pounds</td>
                        </tr>
                        <tr>
                            <td><input type="number" name="stone" value='0'/></td>
                            <td><input type="number" name="pounds" value='0'/></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div id="kg" style="display:none;">
                <div class="form-group" style="padding-right:5px; padding-left:5px;">
                    <span style="font-size:15pt;"><b>Weight</b></span>
                    <button type='button' class="btn btn-link pull-right" id='lnkkg'>Switch to st, lb</button>

                </div>
                <div class="col-md-8" style="padding-left:5px;">
                    <table>
                        <tr>
                            <td>Kg</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="kg" /></td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr>
            <div class="form-group" style="padding-right:5px; padding-left:5px;">
                <span style="font-size:15pt;"><b>Age</b></span>
                <div class="col-md-4" style="padding-left:0px; padding-top:20px;">
                    <input type="number" class="form-control" name="age" value="<?php echo $this->session->userdata['age']?>">
                </div>
            </div>
            <hr>
            <div class="form-group" style="padding-right:5px; padding-left:5px;">
                <span style="font-size:15pt;"><b>Sex</b></span>
                <div class="col-md-4 " style="padding-left:0px; padding-top:20px">
                    <input  name="gender" type="radio" value="Male"
                        <?php 
                            if($this->session->userdata['gender']=='Male')
                            {
                                echo 'checked';
                            }
                        ?>
                    >
                    Male
                    <br>
                    <input name="gender" type="radio" value="Female" 
                        <?php 
                            if($this->session->userdata['gender']=='Female')
                            {
                                echo 'checked';
                            }
                        ?>
                    >
                    Female 
                </div>
            </div>
            <button type="submit" id="btnSubmit" class="btn btn-success"
                style="margin-bottom:10px;"
            > Calculate </button>
            </form>
        </div>  

    </div> <!-- row -->
  </div>  
<script>
   
</script>