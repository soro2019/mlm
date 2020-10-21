    <?php //var_dump($agence); ?>
    <!-- Main content -->
    <section class="content">
          
        
        <div class="row">
            
            
            <div class="col-lg-3">
                <div class="form-group">
                    <select name="agence" id="agence" class="form-control">
                        <option value="">-Choisir l'agence-</option>
                        <option value="">Toutes</option>
                    <?php foreach ($agence as $element) { ?>
                        <option value="<?php if(isset($element['code_agence'])) {echo $element['code_agence'];} ?>"><?php if(isset($element['localisation'])) {echo $element['localisation'];}  ?></option>
                    <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <input type="date" name="order_start_date" value="" class="form-control getDatePicker" id="order-start-date" placeholder="Start date">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <input type="date" name="order_end_date" value="" class="form-control getDatePicker" id="order-end-date" placeholder="End date">
                </div>
            </div>
            
            <div class="col-lg-1">
                <div class="form-group">
                    <button name="filter_order_filter" type="button" class="btn btn-primary btn-block" id="filter-order-filter" value="filter"><i class="fa fa-search fa-fw"></i></button>
                </div>
            </div>
        </div>
      <div class="box">
        <div class="box-body">
            
            <div id="render-list-of-order" class="table-responsive">
            </div>
            
        </div>
        <!-- /.row -->

      </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



