<!-- Content Wrapper. Contains page content -->
<style>
    #example1_wrapper .dataTables_paginate .paginate_button {
    border: 1px solid red;
    padding: 3px;
    cursor: context-menu;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mon réseau
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('backoffice/mon-reseau');?>"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Mon réseau</li>
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

                    <!-- /.box-header -->

                    <div class="box-body table-responsive" id="element_overlapT">

                        <table id="example1" class="table table-bordered table-striped">

                            <thead>

                                <tr>

                                    <th>Pseudo</th>

                                    <th>Nom et Prénoms</th>

                                    <th>Email</th>

                                    <th>Téléphone</th>

                                    <!--<th>Son niveau actuel</th>-->

                                    <th>Inscris le</th>

                                    <th>Niveau</th>
                                    
                                    <th>Côté</th>
                                    
                            <!--    <th>Action</th>-->

                                </tr>

                            </thead>

                            
                            
                            <tbody>
                                    <?php
                           foreach ($users as $user){
                               $dataU = $this->UserModel->GetUserDataByPseudo($user['pseudo_filleul']);
                            ?>
                                        <tr>
                                            <td>
                                                <?= $user['pseudo_filleul']; ?>
                                            </td>
                                            <td>
                                                <?= $dataU['nom']; ?>&nbsp;<?= $dataU['prenoms']; ?>
                                            </td>
                                            <td>
                                                <?= $dataU['email']; ?>
                                            </td>
                                            <td>
                                                <?= $dataU['telephone']; ?>
                                            </td>
                                            <td>
                                                <?= $user['created']; ?>
                                            </td>
                                            <td>
                                                <?= $user['niveau_filleul']; ?>
                                            </td>
                                            <td>
                                                <?= $user['side']; ?>
                                            </td>
                                            <!--<td><a type="button" class="btn btn-primary" href="index.php?ctrl=administration&action=inventeur&id_user=<?php //echo $id; ?>">
                                                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Détail
                                                </a>
                                            </td>-->
                                        </tr>
                                        <?php
                             }
                            ?>
                                </tbody>



                            <tfoot>

                                <tr>

                                    <th>Pseudo</th>

                                    <th>Nom et Prénoms</th>

                                    <th>Email</th>

                                    <th>Téléphone</th>

                                    <!--<th>Son niveau actuel</th>-->

                                    <th>Inscris le</th>

                                    <th>Niveau</th>
                                    
                                    <th>Côté</th>
                                    
                            <!--    <th>Action</th>-->

                                </tr>

                            </tfoot>

                        </table>

                    </div>

                    <!-- /.box-body -->

                </div>

                <!-- /.box -->

            </div>

            <!-- /.col -->

        </div>





    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
