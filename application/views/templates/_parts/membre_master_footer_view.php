</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  
		</ul>
    </div>
    <strong>Copyright &copy; 2020 <a href="http://shappinvest.com">SHAPPINVEST</a>.</strong> All rights reserved.
	 
  </footer>

 
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	 
	
	<!-- jQuery 3 -->
	<script src="<?php echo site_url('assets/member/vendor_components/jquery-3.3.1/jquery-3.3.1.js')?>"></script>
	
	<!-- fullscreen -->
	<script src="<?php echo site_url('assets/member/vendor_components/screenfull/screenfull.js')?>"></script>
	
	<!-- popper -->
	<script src="<?php echo site_url('assets/member/vendor_components/popper/dist/popper.min.js')?>"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="<?php echo site_url('assets/member/vendor_components/bootstrap/dist/js/bootstrap.js')?>"></script>	
	
	<!-- date-range-picker -->
	<script src="<?php echo site_url('assets/member/vendor_components/moment/min/moment.min.js')?>"></script>
	<script src="<?php echo site_url('assets/member/vendor_components/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
	
	<!-- Slimscroll -->
	<script src="<?php echo site_url('assets/member/vendor_components/jquery-slimscroll/jquery.slimscroll.js')?>"></script>
	
	<!-- FastClick -->
	<script src="<?php echo site_url('assets/member/vendor_components/fastclick/lib/fastclick.js')?>"></script>
	
	<!-- Highcharts -->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/highcharts-more.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
		
	<!-- apexcharts -->
	<script src="<?php echo site_url('assets/member/vendor_components/apexcharts-bundle/irregular-data-series.js')?>"></script>
	<script src="<?php echo site_url('assets/member/vendor_components/apexcharts-bundle/dist/apexcharts.js')?>"></script>
	
	<!-- toast -->
	<script src="<?php echo site_url('assets/member/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js')?>"></script>
	
	<!-- VoiceX Admin App -->
	<script src="<?php echo site_url('assets/member/js/template.js')?>"></script><!-- 
	<script src="<?php echo site_url('assets/member/js/pages/voice-search.js')?>"></script> -->
	
	<!-- VoiceX Admin dashboard demo (This is only for demo purposes) -->
	<script src="<?php echo site_url('assets/member/js/pages/dashboard7.js')?>"></script>
	
	<!-- VoiceX Admin for demo purposes -->
	<script src="<?php echo site_url('assets/member/js/demo.js')?>"></script>
	
	<script type="text/javascript">
        var code;
        function createCaptcha() {
          //clear the contents of captcha div first 
          document.getElementById('captcha').innerHTML = "";
          var charsArray ="0123456789";
          var lengthOtp = 6;
          var captcha = [];
          for (var i = 0; i < lengthOtp; i++) {
            //below code will not allow Repetition of Characters
            var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
            if (captcha.indexOf(charsArray[index]) == -1)
              captcha.push(charsArray[index]);
            else i--;
          }
          var canv = document.createElement("canvas");
          canv.id = "captcha";
          canv.width = 100;
          canv.height = 40;
          var ctx = canv.getContext("2d");
          ctx.font = "25px Georgia";
          ctx.strokeText(captcha.join(""), 0, 30);
          //storing captcha so that can validate you can save it somewhere else according to your specific requirements
          code = captcha.join("");
          document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
        }
        function validateCaptcha() {
         
          debugger
          if(document.getElementById("cpatchaTextBox").value != code) {
              event.preventDefault();
              alert("<?php echo 'Le Captcha est invalide'; ?>");
              return false;
          }else
          {
            return true;
          }
        }
</script>
</body>
</html>
