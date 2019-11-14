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

</body>

</html>
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
});
</script>
