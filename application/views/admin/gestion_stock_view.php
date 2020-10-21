<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $titre; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('administrator~gie2018');?>"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active"><?= $lien; ?></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Tableau d'Entrée(s) et Sortie(s) du Stock</h3>
              </div>
              <!-- /.box-header -->
              <style>
                  thead tr th, thead tr td{
                      text-align: center;
                      font-weight: bold;
                  }
              </style>
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover" >
                  <thead>
                    <tr>
                      <th rowspan="3">Date</th>
                      <th rowspan="3">Libellé</th>
                      <th colspan="6">Monvement</th>
                    </tr>
                    <tr>
                      <th colspan="3">Entrées en Stock</th>
                      <th colspan="3">Stortie de Stock</th>
                      <th colspan="3">Stock Final</th>
                    </tr>
                    <tr> 
                       <td width="2%"> Quté</td>
                      <td width="2%"> Quté</td>
                      <td width="10%">Prix</td>
                      <td width="10%">Montant</td> 
                      <td width="2%"> Quté</td>
                      <td width="10%">Prix</td>
                      <td width="10%">Montant</td> 
                      <td width="2%"> Quté</td>
                      <td width="10%">Prix</td>
                      <td width="10%">Montant</td>
                    </tr>
                  </thead>
                  
                  <thead>
                    <tr> 
                      <td width="8%">Date</td>
                      <td width="25%">Libellé</td>
                      <td width="2%"> Quté</td>
                      <td width="10%">Prix</td>
                      <td width="10%">Montant</td> 
                      <td width="2%"> Quté</td>
                      <td width="10%">Prix</td>
                      <td width="10%">Montant</td> 
                      <td width="2%"> Quté</td>
                      <td width="10%">Prix</td>
                      <td width="10%">Montant</td>
                    </tr>
                    
                  </thead>
                </table>
              </div>
              <br>
            </div>
        </div> 
    </section>   
</div>