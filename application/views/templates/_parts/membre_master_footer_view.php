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

  <!-- This is data table -->
    <script src="<?php echo site_url('assets/member/vendor_components/datatable/datatables.min.js')?>"></script>

    <script src="<?php echo site_url('assets/member/js/pages/data-table.js')?>"></script>
	
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
   <script type="text/javascript">
    var operationTable;
    var base_url = "<?php echo base_url(''); ?>";

    $(document).ready(function() {
        $("#languageNav").addClass('active');
            
        // initialize the datatable 
        var base_url = "<?php echo base_url('main/');?>"; // You can use full url here but I prefer like this
        operationTable = $('#operation-table').DataTable({
            
            'paging': true,
            'lengthChange': true,
            'searching': false,
            /*'ordering': true,*/
            'info': true,
            'responsive': false,
            /* Processing indicator */
            "processing": true,
            "pageLength" : 10,
            "serverSide": true,
            "order": [],
            "ajax":{
              dataType: "JSON",
              url :  base_url+'dataImpetrant2',
              type : 'POST',
              
              data: function(data){
                   data.identifiant_genered = $('#identifiant_genered').val();
                   data.nom_prenoms = $('#nom_prenoms').val();
                   data.date_envoie = $('#date_envoie').val();
                }
            },

        });

       $('#identifiant_genered, #nom_prenoms, #date_envoie').change(function(){
          operationTable.draw();
       });
       $('#identifiant_genered, #nom_prenoms, #date_envoie').keyup(function(){
          operationTable.draw();
       });

    });
 </script>
         
</body>
</html>
