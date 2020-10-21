<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profil de membre
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url('backoffice');?>"><i class="fa fa-dashboard"></i> Tableau de bord</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary" id="element_overlap">
                    <div class="box-body box-profile">


                        <img class="profile-user-img img-responsive img-circle profileImgUrl" src="<?php echo site_url('assets/membre/dist/img/user2-160x160.jpg');?>" alt="<?=$user['nom'];?>">



                        <h3 class="profile-username text-center NameEdt">
                            <?=$user['nom'];?>
                        </h3>

                        <p class="text-muted text-center">Membre depuis
                            <?=$user['creele'];date("m/d/y h:i:s a", $user['created_on']);//date('M. Y',strtotime() );?>
                        </p>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom" id="element_overlap1">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Informations générales</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                           
                           <?php
                               if($this->session->flashdata('message_erreur') !== null){
                                   echo '<div class="alert alert-danger" role="alert">Erreur: ' .$this->session->flashdata('message_erreur').'</div>';
                               }
                                 
                               elseif(validation_errors() !== ''){
                                   echo '<div class="alert alert-danger" role="alert">Erreur: ' .validation_errors().'</div>';
                               }
                            
                            echo form_open('backoffice/membre/modifier_profil',array('class' => 'form-horizontal UpdateDetails'));?>
                               
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Pseudo</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?=$user['pseudo']?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Nom</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="prenoms" value="<?=$user['prenoms']?>" placeholder="Prénoms">
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="nom" value="<?=$user['nom']?>" placeholder="Nom">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Date de naissance</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="date" value="<?=$user['date_naissance']?>" placeholder="Date de naissance (exple: 11/07/1972)">
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="lieu" value="<?=$user['Lieu_naissance']?>" placeholder="Lieu de naissance">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" value="<?=$user['email']?>" placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Téléphone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="telephone" value="<?=$user['telephone']?>" placeholder="Numéro de téléphone (exple: 22509847556)">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">Pays</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="pays" value="<?=$user['pays']?>" placeholder="Pays">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">Ville</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="ville" value="<?=$user['ville']?>" placeholder="Ville">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">Quartier</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="adresse" value="<?=$user['adresse']?>" placeholder="Quartier">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Parrain</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="pseudo_parrain" value="<?=$user['pseudo_parrain']?>" placeholder="Parrain" readonly>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">A propos de moi</label>

                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="apropos" placeholder="A propos de moi"><?=$user['apropos']?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                       <input type="submit" name="modifier-profil" value="Je modifie" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                            
                        </div>



                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->


</div>



<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <form class="UploadForm">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="document_name">Change Profile Photo</h4>
                </div>
                <div class="modal-body">
                    <input type="file" required id="userImage">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info Upload">Upload</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>
<!-- /.content-wrapper -->
