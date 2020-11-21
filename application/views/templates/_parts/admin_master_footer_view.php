<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 0.0.1
    </div>
    <strong>Copyright &copy; 2018 SHAPPINVEST par <a href="http://shappinvest.com">SHAPPINVEST</a>.</strong> Tous droits réservés.
</footer>


</div>
<!-- ./wrapper -->


<?php if(isset($js_files)){
    foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; } ?>
<?php if(!isset($js_files)){ ?>     
  <!--  jQuery 3 -->
<script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd = '0'+dd
    } 

    if(mm<10) {
        mm = '0'+mm
    } 

    today = mm + '_' + dd + '_' + yyyy;
</script>
<script src="<?php  echo site_url('assets/membre/bower_components/jquery/dist/jquery.min.js');?>"></script>

<!-- jQuery UI 1.11.4 -->
<script src="<?php  echo site_url('assets/membre/bower_components/jquery-ui/jquery-ui.min.js');?>"></script>

<?php } ?> 
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);

</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo site_url('assets/membre/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">
</script>
<!-- Morris.js charts -->
<script src="<?php echo site_url('assets/membre/bower_components/raphael/raphael.min.js');?>"></script>
<script src="<?php echo site_url('assets/membre/bower_components/morris.js/morris.min.js');?>"></script>
<!-- Sparkline -->
<script src="<?php echo site_url('assets/membre/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js');?>"></script>
<!-- jvectormap -->
<script src="<?php echo site_url('assets/membre/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');?>"></script>
<script src="<?php echo site_url('assets/membre/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo site_url('assets/membre/bower_components/jquery-knob/dist/jquery.knob.min.js');?>"></script>
<!-- daterangepicker -->
<script src="<?php echo site_url('assets/membre/bower_components/moment/min/moment.min.js');?>"></script>
<script src="<?php echo site_url('assets/membre/bower_components/bootstrap-daterangepicker/daterangepicker.js');?>"></script>
<!-- datepicker -->
<script src="<?php echo site_url('assets/membre/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo site_url('assets/membre/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>"></script>
<!-- Slimscroll -->
<script src="<?php echo site_url('assets/membre/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
<!-- FastClick -->
<script src="<?php echo site_url('assets/membre/bower_components/fastclick/lib/fastclick.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo site_url('assets/membre/dist/js/adminlte.min.js');?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo site_url('assets/membre/dist/js/pages/dashboard.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo site_url('assets/membre/dist/js/demo.js');?>"></script>
<script src="<?php echo site_url('assets/membre/perso/js/jsperso.js');?>"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/cr-1.5.0/fc-3.2.5/r-2.2.2/sc-1.5.0/datatables.min.js"></script>
<?php if($page_title=='Gestion membres | Administration'){ ?> 
<script type="text/javascript">
    var userTable;

    $(document).ready(function() {
            
        // initialize the datatable 
        var base_url = "<?php echo base_url('admin/principal/');?>"; // You can use full url here but I prefer like this
        userTable = $('#userTable').DataTable({
            
            'paging': true,
            'lengthChange': true,
            'searching': false,
            'info': true,
            'responsive': false,
            "processing": true,
            "pageLength" : 10,
            "serverSide": true,
            "order": [],
            "ajax":{
              dataType: "JSON",
              url :  base_url+'gestion_membres_data',
              type : 'POST',
              
              data: function(data){
                   data.pseudo = $('#filter-pseudo').val();
                   data.parrain = $('#filter-parrain').val();
                   data.nom_prenoms = $('#filter-nom').val();
                   data.niveau = $('#filter-niveau').val();
                   data.created_on = $('#order-start-date').val();
                }
            },

        });

       $('#filter-pseudo, #filter-parrain, #filter-nom, #filter-niveau, #order-start-date, #order-end-date').change(function(){
          manageTable.draw();
       });
       $('#filter-pseudo, #filter-parrain, #filter-nom, #filter-niveau, #order-start-date, #order-end-date').keyup(function(){
          manageTable.draw();
       });

    });
 </script>
<?php } ?>
    

<?php if(isset($before_head)) echo $before_body;?>
</body>

</html>