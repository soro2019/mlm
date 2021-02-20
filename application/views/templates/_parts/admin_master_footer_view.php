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
    
    


<?php if($page_title=='SORO'){ ?> 
<script>
		// render order list data table
	// default render page
	jQuery(document).ready(function() {
		var data = {pseudo:"", nom:"", prenoms:"", bon:"", niveau:"", startDate: "", endDate: ""};
		generateUserTable(data);
	});

	// render date datewise
	jQuery(document).on('click','#filter-order-filter', function(){
		var pseudo = jQuery('input#filter-pseudo').val();    
		var nom = jQuery('input#filter-nom').val();
		var prenoms = jQuery('input#filter-prenoms').val();
		var bon = jQuery('input#filter-bon').val();
		var niveau = jQuery('input#filter-niveau').val();
		var startDate = jQuery('input#order-start-date').val();    
		var endDate = jQuery('input#order-end-date').val();
		var data = {pseudo:pseudo, nom:nom, prenoms:prenoms, tel:tel, bon:bon, niveau:niveau, startDate:startDate, endDate:endDate};
		generateUserTable(data);
	});
	// generate Order Table
	function generateUserTable(element){	
		jQuery.ajax({
			url: '<?= site_url('administrator~shappinvest/principal/gestion_membres_data');?>',
			data: {'pseudo' : element.pseudo , 'nom' : element.nom, 'prenoms' : element.prenoms, 'tel' : element.tel , 'bon' : element.bon, 'niveau' : element.niveau, 'start_date' : element.startDate , 'end_date' : element.endDate},
			type: 'post', 
			dataType: 'json',
			beforeSend: function () {
				jQuery('#render-list-of-order').html('<div class="text-center mrgA padA"><i class="fa fa-spinner fa-pulse fa-4x fa-fw"></i></div>');
			},			 
			success: function (html) {
                
				var dataTable='<table id="order-datatable" class="table cell-border hover order-column table-striped" cellspacing="0" width="100%"></table>';
				jQuery('#render-list-of-order').html(dataTable);		
				var table = $('#order-datatable').DataTable({
					data: html.data,
					"bPaginate": true,
					"bLengthChange": true,
                      'searching'   : false,
                      'ordering'    : true,
                      'info'        : true,
                      'autoWidth'   : false,
                      responsive: false,
                      dom: 'lBfrtip',
                    /*buttons: [
                        'copy', 'excel', 'pdf'
                    ],*/
                    
                    buttons: [ 
                        { 
                            extend: 'excel', 
                            text: 'Exporter en EXCEL',
                            //className: 'excelButton',
                            filename: 'Etat des créances_'+today
                            
                        },
                        {
                            extend: 'pdfHtml5',
                            text: 'Exporter en PDF',
                            orientation: 'landscape', //portrait
                            pageSize: 'A4', //A3 , A5 , A6 , legal , letter
                            //className: 'pdfButton',
                            filename: 'Etat des créances_'+today,
                            exportOptions: {
                                columns: ':visible',
                                search: 'applied',
                                order: 'applied'
                            }
                        },
                        { 
                            extend: 'print', 
                            text: 'Imprimer',
                            orientation: 'landscape', //portrait
                            pageSize: 'A4', //A3 , A5 , A6 , legal , letter
                            //className: 'printButton'
                            filename: 'Etat des créances_'+today,
                        }
                    ],
                    
					columns: [
						{ title: "Ordre", "width": "2%"},
						{ title: "Pseudo", "width": "15%"},
						{ title: "Nom", "width": "10%"},
						{ title: "Prénoms", "width": "15%"},
						{ title: "tel", "width": "10%"},
						{ title: "Bon d'achat", "width": "10%"},					
						{ title: "Niveau", "width": "10%"},
						{ title: "Crée le", "width": "15%"}
					],
                    
                    "language": {
                        "sProcessing":     "Traitement en cours...",
                        "sSearch":         "Rechercher&nbsp;:",
                        "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
                        "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                        "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                        "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                        "sInfoPostFix":    "",
                        "sLoadingRecords": "Chargement en cours...",
                        "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                        "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                        "oPaginate": {
                            "sFirst":      "Premier",
                            "sPrevious":   "Pr&eacute;c&eacute;dent",
                            "sNext":       "Suivant",
                            "sLast":       "Dernier"
                        },
                        "oAria": {
                            "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                            "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                        },
                        "select": {
                                "rows": {
                                    _: "%d lignes séléctionnées",
                                    0: "Aucune ligne séléctionnée",
                                    1: "1 ligne séléctionnée"
                                } 
                        }
                    }
				});
			}
            
		});
	}
	</script>
<?php } ?> 


<?php if($page_title=='Gestion des demandes | Administration'){ ?> 
<script type="text/javascript">
    var retraitTable;
    $(document).ready(function() {
        $("#languageNav").addClass('active');
            
        // initialize the datatable 
        var base_url = "<?php echo base_url('admin/principal/');?>"; // You can use full url here but I prefer like this
        retraitTable = $('#retraitTable').DataTable({


          "bPaginate": true,
          "bLengthChange": true,
          'info'        : true,       
            'paging': true,
            'lengthChange': true,
            'searching': false,
            'ordering': true,
            'info': true,
            'responsive': true,
            /* Processing indicator */
            "processing": true,
            "pageLength" : 10,
            "serverSide": true,
            "order": [],
            "ajax":{
              dataType: "JSON",
              url :  base_url+'gestion_demandes_data',
              type : 'POST',
              beforeSend: function () {
                jQuery('#render-list-of-order').html('<div class="text-center mrgA padA"><i class="fa fa-spinner fa-pulse fa-4x fa-fw"></i></div>');
             },
              
              data: function(data){
               data.pseudodestinataire = $('#filter-pseudo').val();
              }
            },
            

        });

       $('#filter-pseud').change(function(){
          retraitTable.draw();
       });

       $('#filter-pseudo').keyup(function(){
          retraitTable.draw();
       });

    });

</script>
<?php } ?> 

<?php if($page_title=='Gestion membres | Administration' && $niveau==""){ ?> 
<script type="text/javascript">
    var userTable;

    $(document).ready(function() {
        $("#languageNav").addClass('active');
            
        // initialize the datatable 
        var base_url = "<?php echo base_url('admin/principal/');?>"; // You can use full url here but I prefer like this
        userTable = $('#userTable').DataTable({
            
            'paging': true,
            'lengthChange': true,
            'searching': false,
            /*'ordering': true,*/
            'info': true,
            'responsive': true,
            /* Processing indicator */
            "processing": true,
            "pageLength" : 10,
            "serverSide": true,
            "order": [],
            "ajax":{
              dataType: "JSON",
              url :  base_url+'gestion_membres_data',
              type : 'POST',
              beforeSend: function () {
                jQuery('#render-list-of-order').html('<div class="text-center mrgA padA"><i class="fa fa-spinner fa-pulse fa-4x fa-fw"></i></div>');
             },
              
              data: function(data){
                   /*data.code = $('#code').val();
                   data.ref = $('#ref').val();
                   data.name = $('#name').val();
                   data.price = $('#price').val();
                   data.category = $('#category').val();
                   data.quantity = $('#quantity').val();
                   data.brand = $('#brand').val();
                   data.supplier = $('#supplier').val();
                   data.warehouse = $('#warehouse').val();
                   data.location = $('#location').val();*/
                }
            },
            

        });

     /*  $('#category,#brand,#supplier,#warehouse').change(function(){
          productTable.draw();
       });
       $('#code,#ref,#name,#price,#quantity,#location').keyup(function(){
          productTable.draw();
       });*/


    });

</script>
<?php } ?> 

<?php if($page_title=='Gestion membres | Administration' && $niveau!=""){ ?>
<script type="text/javascript">
    var userTable;

    $(document).ready(function() {
        $("#languageNav").addClass('active');
            
        // initialize the datatable 
        var base_url = "<?php echo base_url('admin/principal/');?>"; // You can use full url here but I prefer like this
        userTable = $('#userTable').DataTable({
            
            'paging': true,
            'lengthChange': true,
            'searching': false,
            /*'ordering': true,*/
            'info': true,
            'responsive': true,
            /* Processing indicator */
            "processing": true,
            "pageLength" : 10,
            "serverSide": true,
            "order": [],
            "ajax":{
              dataType: "JSON",
              url :  base_url+'gestion_membres_matrice_data/'+<?= $niveau ?>,
              type : 'POST',
              beforeSend: function () {
                jQuery('#render-list-of-order').html('<div class="text-center mrgA padA"><i class="fa fa-spinner fa-pulse fa-4x fa-fw"></i></div>');
             },
              
              data: function(data){
                   /*data.code = $('#code').val();
                   data.ref = $('#ref').val();
                   data.name = $('#name').val();
                   data.price = $('#price').val();
                   data.category = $('#category').val();
                   data.quantity = $('#quantity').val();
                   data.brand = $('#brand').val();
                   data.supplier = $('#supplier').val();
                   data.warehouse = $('#warehouse').val();
                   data.location = $('#location').val();*/
                }
            },
            

        });

     /*  $('#category,#brand,#supplier,#warehouse').change(function(){
          productTable.draw();
       });
       $('#code,#ref,#name,#price,#quantity,#location').keyup(function(){
          productTable.draw();
       });*/


    });

</script>
<?php } ?>
    

<?php if(isset($before_head)) echo $before_body;?>
</body>

</html>