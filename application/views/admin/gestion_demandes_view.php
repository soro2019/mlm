
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <input type="text" name="pseudo" class="form-control" id="filter-pseudo" placeholder="Pseudo">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <input type="date" name="order_start_date" class="form-control getDatePicker" id="order-start-date" placeholder="Start date">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <input type="date" name="order_end_date" class="form-control getDatePicker" id="order-end-date" placeholder="End date">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <button name="filter_order_filter" type="button" class="btn btn-primary btn-block" id="filter-order-filter" value="filter"><i class="fa fa-search fa-fw"></i></button>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="box-body">
                <!-- <div id="render-list-of-order" class="table-responsive">
                </div> -->
                <div class="table-responsive">
                  <table id="retraitTable" class="table cell-border hover order-column table-striped" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                      <th></th>
                      <th>Pseudo</th>
                      <th>Compte</th>
                      <th>Montant sur le compte</th>
                      <th>Montant du retrait</th>
                      <th>Date de demande</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                     
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
        <!-- /.row -->




    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal modal-default fade" id="rejete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <center>
                        <h2 class="box-title">Pourquoi vous rejetez cette transaction</h2>
                    </center>
                </h4>
            </div>
            <div class="modal-body" id="rejete_view">
                 
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>  
</div>

<script type="text/javascript">
 function viewinventory(id){
    var base_url = "<?php echo base_url('admin/principal/');?>";
    $.ajax({
            url: base_url+'modalrejete/',
            type: 'POST',
            data : {id : id},
            dataType: 'json',
            success:function(response) {
                document.getElementById('rejete_view').innerHTML=response;
            }
        });
     
  }
</script>