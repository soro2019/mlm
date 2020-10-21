<!-- Content Wrapper. Contains page content -->
<form class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $titre; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('administrator~gie2018');?>"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li><a href="<?php echo site_url('administrator~gie2018/facture');?>"><i class="fa fa-ruble"></i> Facture</a></li>
            <li class="active"><?= $lien; ?></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    
                <!-- /.box-header -->
                    <!-- form start -->
                    <div class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group pull-right">
                                <label for="inputPassword3" class="col-sm-2 control-label">Date:</label>
                                <div class="col-sm-10">
                                    <input type="Date" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group pull-left">
                                <label for="inputEmail3" class="col-sm-1 control-label">N</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control "  placeholder="Numéro">
                                </div>
                            </div>
                        </div>
                      <!-- /.box-footer -->
                    </div>

          
        </div>
       
        <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">FOURNISSEUR</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div role="form">
                        <div class="box-body">
                            <div class="form-group">
                              <label >Nom :</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nom du fournisseur" name="Nom_frs">
                            </div>
                            <div class="form-group">
                              <label >Adresse</label>
                              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Adresse postale fournisseur" name="adrs_post_frs">
                            </div>
                            
                            <div class="form-group">
                              <label >Tel/cel</label>
                              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Adresse postale" name="tel_frs">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box-body -->
            <div class="col-md-6">
              <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">LIVREUR</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div role="form">
                        <div class="box-body">
                            <div class="form-group">
                              <label >Nom :</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nom du livreur" name="nom_lvre">
                            </div>
                            <div class="form-group">
                              <label >Prénom :</label>
                              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Prénom livreur" name="prnom_lvre">
                            </div>
                            <div class="form-group">
                              <label >Tel :</label>
                              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Téléphone du client" name="tel_livre">
                            </div>
                            
                        </div>
                    </div>
            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>
          <!-- /.box -->

    </section>
    
    <!-- /.content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    
                <!-- /.box-header -->
                    <!-- form start -->
                    <div class="form-horizontal">
                        
                        <div class="box-header with-border">
                          <h3 class="box-title">COMMANDE</h3>
                        </div>

                        <div class="box-body">                            
                            <div class="form-group pull-left col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-addon">Prix Unitaire</span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon">F CFA</span>
                                </div>
                            </div>
                            <div class="form-group pull-right col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-addon">Quantité</span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon">baqué</span>
                                </div>
                            </div>
                        </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" class="btn btn-default">Effacer</button>
                        <button type="submit" class="btn btn-info pull-right">Enregitrer</button>
                      </div>
                      <!-- /.box-footer -->
                    </div>
                  </div>
          <!-- /.box -->

          
        </div>
        </div> 
    </section>




    <!-- /.content -->
</form>