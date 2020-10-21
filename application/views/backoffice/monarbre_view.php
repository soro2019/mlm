<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mon arbre généalogique
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('backoffice/mon-reseau');?>"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Mon arbre</li>
        </ol>
    </section>
    <br>
    <!-- Main content -->
    <section class="content">
     
        <div class="row">

            <div class="col-xs-12" >
            
                <div class="box" >
                  <div class="conteneur-fluid">  
                    <div class="box-header">

                        <h3 class="box-title">&nbsp;</h3>



                    </div>

                    <!-- /.box-header -->

                    <div class="hv-wrapper">
                        
                        
                            <?php
                                   //var_dump($this->UserModel->GetArbreByPseudo($this->session->userdata('identity')));
                                   $this->UserModel->GetArbreByPseudo($this->session->userdata('identity'));
                            ?>

                        

                    </div>

                    <!-- /.box-body -->

                  </div>
                </div>

                <!-- /.box -->

            </div>

            <!-- /.col -->

        </div>
     




    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->