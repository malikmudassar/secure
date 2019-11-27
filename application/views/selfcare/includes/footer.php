<footer class="sticky-footer">
        <div class="container-fluid bg-white footer-btm">
          <nav class="navbar navbar-expand-lg ">
                <div class="container px-0">
              		<div class="navbar-brand copyright-footer footer-list-item span" >
              		<span><i class="fa fa-copyright"></i> EZ Triage <?php echo date('Y')?>. </span><span>All rights reserved.</span>
              		</div>
                      <p> Powered by <img src="<?php echo ASSET_URL?>assets/img/dashboard/attech.svg" alt="AT Tech" class="img-fluid attech-logo"></p>
                </div>
          </nav>

    </div>
</footer>


  <script src="<?php echo ASSET_URL?>assets/jquery/jquery.min.js"></script>
  <script src="<?php echo ASSET_URL?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo ASSET_URL?>assets/js/sweetalert.min.js"></script>  
</body>

</html>
<script type="text/javascript" src='https://cdn.tiny.cloud/1/2wclbxuavz6ayi7xrhoioxos5bw22aeb9ndkgqnx52liew46/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
<script type="text/javascript">
      tinymce.init({
      selector: '#myTextarea',
      height: 300,    
      content_css: 'css/content.css',
      toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
      });
</script>
<script>
$(document).ready(function(){
      $('#lnkCm').click(function(){
            $('#feet').hide();
            $('#cm').show();
      });
      $('#lnkft').click(function(){
            $('#cm').hide();
            $('#feet').show();
      });
      $('#lnkst').click(function(){
            $('#stone').hide();
            $('#kg').show();
      });
      $('#lnkkg').click(function(){
            $('#kg').hide();
            $('#stone').show();
      });

      $('#btn-feedback').click(function(){
            $('#feedback').submit();
      });
      $('#type').on('change',function(){
            var type=$('#type').val();
            var pw=<?php echo $this->uri->segment(3);?>;
            Url="<?php echo base_url().'activity/getFeedbacksByType/'?>"+type+'/'+pw;
            $.ajax({url: Url,success: function(result)
                        {
                              $("#type_content").html(result);
                        }
                  }
            );
      });
});
</script>
