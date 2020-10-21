<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mon Parrain
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('backoffice/dashboard');?>"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Mon parrain</li>
        </ol>
    </section>
    <br>
    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-xs-12">

                <div class="box">

                    <div class="box-header">

                        <h3 class="box-title">&nbsp;</h3>



                    </div>
                    <div class="container table-responsive">


                        <table id="example1" class="table table-bordered">
                            

                                <tr>
                                    <td>
                                        Pseudo de votre parrain
                                    </td>
                                    <td>
                                        <b><?= $monparain['pseudo']; ?></b>
                                    </td>

                                </tr>
                                
                                <tr>
                                    <td>
                                        Nom de votre parrain
                                    </td>
                                    <td>
                                       <b> <?= $monparain['nom']; ?></b>
                                    </td>

                                </tr>
                                
                                <tr>
                                    <td>
                                        Prénoms de votre parrain
                                    </td>
                                    <td>
                                        <b><?= $monparain['prenoms']; ?></b>
                                    </td>

                                </tr>
                                
                                <tr>
                                    <td>
                                        Téléphone
                                    </td>
                                    <td>
                                       <b> <?= $monparain['telephone']; ?></b>
                                    </td>

                                </tr>
                                
                                <tr>
                                    <td>
                                        Email
                                    </td>
                                    <td>
                                        <b><?= $monparain['email']; ?></b>
                                    </td>

                                </tr>
                                
                                                            

                        </table>
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
