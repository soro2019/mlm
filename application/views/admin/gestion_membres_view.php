
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-lg-1">
                <div class="form-group">
                    <input type="text" name="pseudo" value="" class="form-control" id="filter-pseudo" placeholder="Pseudo">
                </div>
            </div>
            <div class="col-lg-1">
                <div class="form-group">
                    <input type="text" name="nom" value="" class="form-control" id="filter-nom" placeholder="Nom">
                </div>
            </div>
            <div class="col-lg-1">
                <div class="form-group">
                    <input type="text" name="prenoms" value="" class="form-control" id="filter-prenoms" placeholder="Prénoms">
                </div>
            </div>
            <div class="col-lg-1">
                <div class="form-group">
                    <input type="text" name="bon" value="" class="form-control" id="filter-bon" placeholder="Bon d'achats">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <input type="number" name="niveau" value="" class="form-control" id="filter-niveau" placeholder="Niveau">
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
        </div>
        <!-- /.row -->




    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



