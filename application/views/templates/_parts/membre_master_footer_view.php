</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->

  <div class="modal center-modal fade" id="userinfo" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?=ucfirst(get_phrase('information sur le user'))?></h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="infouser">
           
        </div>
        <div class="modal-footer modal-footer-uniform">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><?=ucfirst(get_phrase('fermer'))?></button>
        </div>
      </div>
    </div>
  </div>

   <div class="modal fade bs-example-modal-lg" style="left: 140px !important;" id="reseauinfo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel"><?=ucfirst(get_phrase('information sur son réseau'))?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div id="inforeseau">
           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><?=ucfirst(get_phrase('fermer'))?></button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
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

  <!-- Select2 -->
  <script src="<?php echo site_url('assets/member/vendor_components/select2/dist/js/select2.full.js')?>"></script>
  
	<!-- apexcharts -->
	<script src="<?php echo site_url('assets/member/vendor_components/apexcharts-bundle/irregular-data-series.js')?>"></script>
	<script src="<?php echo site_url('assets/member/vendor_components/apexcharts-bundle/dist/apexcharts.js')?>"></script>


  <!-- <script src="<?php //echo site_url('assets/member/vendor_components/ckeditor/ckeditor.js')?>"></script> -->
  
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?php echo site_url('assets/member/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')?>"></script>
  
  <!-- VoiceX Admin for editor -->
  <script src="<?php echo site_url('assets/member/js/pages/editor.js')?>"></script>

  <!-- This is data table -->
	
	<!-- toast -->
	<script src="<?php echo site_url('assets/member/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js')?>"></script>
	
	<!-- VoiceX Admin App -->
	<script src="<?php echo site_url('assets/member/js/template.js')?>"></script><!-- 
	<script src="<?php echo site_url('assets/member/js/pages/voice-search.js')?>"></script> -->
	
	<!-- VoiceX Admin dashboard demo (This is only for demo purposes) -->
	<script src="<?php echo site_url('assets/member/js/pages/dashboard7.js')?>"></script>
	
	<!-- VoiceX Admin for demo purposes -->
	<script src="<?php echo site_url('assets/member/js/demo.js')?>"></script>
  <script src="<?php echo site_url('assets/member/js/filter.js')?>"></script>

	
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
        function copy() {
          var copyText = document.querySelector("#to-copy");
          copyText.select();
          document.execCommand("copy");
        }

        document.querySelector("#copy").addEventListener("click", copy);


        function infouser(id){

            //alert(pseudo);
            var base_url = "<?php echo base_url('backoffice/dashboard/');?>";
            $.ajax({
                    url: base_url+'modaldInfoFieulle/',
                    type: 'POST',
                    data : {id : id},
                    dataType: 'json',
                    success:function(response) {
                        document.getElementById('infouser').innerHTML=response;
                    }
                });
             
          }

          function reseauinfo(id, niveau){

            //alert(pseudo);
            var base_url = "<?php echo base_url('backoffice/dashboard/');?>";
            $.ajax({
                    url: base_url+'modalinforeseau/',
                    type: 'POST',
                    data : {id : id, niveau : niveau},
                    dataType: 'json',
                    success:function(response) {
                        document.getElementById('inforeseau').innerHTML=response;
                    }
                });
          }
          

          function infoachat(id){

            //alert(pseudo);
            var base_url = "<?php echo base_url('backoffice/dashboard/');?>";
            $.ajax({
                    url: base_url+'modaldProduit/',
                    type: 'POST',
                    data : {id : id},
                    dataType: 'json',
                    success:function(response) {
                        document.getElementById('infoachat').innerHTML=response;
                    }
                });
             
          }

    </script>          
</body>
</html>
