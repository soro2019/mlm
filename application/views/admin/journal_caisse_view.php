<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $titre; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('administrator~gie2018');?>"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li><a href="<?php echo site_url('administrator~gie2018/journal');?>"><i class="fa fa-book"></i> Journal</a></li>
            <li class="active"><?= $lien; ?></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Journal caisse du <?//= $Datejour?></h3>
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
                      <th width="5%">Date</th>
                      <th width="35%">LIBELE</th>
                      <th width="20">DEBIT</th>
                      <th width="20">CREDIT</th>
                      <th width="20">SOLDE</th>
                    </tr>
                    
                  </thead>
                  
                  <thead>
                    
                    
                  </thead>
                </table>
              </div>
              <br>
            </div>
        </div> 
    </section> 
</div>