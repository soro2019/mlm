
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-2">
                <div class="form-group">
                    <input type="text" name="pseudo" value="" class="form-control" id="filter-pseudo" placeholder="Pseudo">
                </div>
            </div>

            <div class="col-lg-2">
                <div class="form-group">
                    <input type="text" name="parrain" value="" class="form-control" id="filter-parrain" placeholder="Parrain">
                </div>
            </div>
            
            <div class="col-lg-2">
                <div class="form-group">
                    <input type="text" name="nom" value="" class="form-control" id="filter-nom" placeholder="Nom">
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
        </div>
        <div class="box">
            <div class="box-body">
                <div id="render-list-of-order" class="table-responsive">
                 <table class="table table-striped table-bordered table-hover table-checkable" id="userTable">
                        <thead>
                            <tr>
                             <th>N</th>
                             <th>Pseudo</th>
                             <th>Nom & Prénoms</th>
                             <th>Parrain</th>
                             <th>Contact</th>
                             <th>Sexe</th>
                             <th>Ville</th>
                             <th>Niveau</th>
                             <th>Inscrit le</th>
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



