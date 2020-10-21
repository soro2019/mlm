
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- col Membre inscrit dans la matrice-->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>
                            <?= $TousLesMembres; ?>
                        </h3>

                        <p>Membres dans la matrice</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col-->
            <!-- col Membre inscrit par jour-->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <h3>
                            <?= $NombreDeMembresDuJour;?>
                        </h3>

                        <p>Inscrit aujourd'hui</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- col Membre inscrit par semaine-->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>
                            <?= $NombreDeMembresDeLaSemaine?>
                        </h3>

                        <p>Inscrit cette semaine</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
             <!-- col Membre inscrit par mois-->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <h3>
                            <?= $NombreDeMembresDeCeMois?>
                        </h3>

                        <p>Inscrit en ce mois</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            
            <!-- col Montant recolté-->
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3 >
                            <?= $MontantRecolte;?>&nbsp;FCFA</h3>

                        <p>Montant recolté</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <!-- col Marge bénéficiaire-->
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                            <?= $MargeBeneficiaire; ?>&nbsp;FCFA
                        </h3>

                        <p>Marge bénéficiaire</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- col Montant dépencer SMS-->
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                            <?= $MontantCoutSms;?>&nbsp;FCFA
                        </h3>

                        <p>Montant dépencer SMS</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-email"></i>
                    </div>
                    <a href="#" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- col Montant du fond de roulement du MLM-->
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                            <?= $MontantDuFondMlm;?>&nbsp;FCFA
                        </h3>

                        <p>Roulement MLM</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="#" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            
            <!-- ./col -->
            <!--<div class="col-lg-12 col-xs-6">
                <div class="nav-tabs-custom">
                     Tabs within a box 
                    <ul class="nav nav-tabs pull-right">
                      <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                      <li ><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                      <li ><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                      <li ><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                      <li ><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                    </ul>
                    <div class="tab-content no-padding">
                      
                      <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                      <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                    </div>
                </div>
            </div>-->
          <!-- /.nav-tabs-custom -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
