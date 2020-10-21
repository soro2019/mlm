    <!-- Main content -->
    <section class="content">
    <?php 
        /*if (isset($infos_membre))*/
    ?>
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary" id="element_overlap">
                    <div class="box-body box-profile">


                        <img class="profile-user-img img-responsive img-circle profileImgUrl" src="<?php 
                                if ($info_user['img_profil'] =='') {
                                    if ($info_user['genre'] =='M') {
                                        echo site_url('assets/employee/img/avatar2.png');
                                    }
                                    if ($info_user['genre'] =='F') {
                                        echo site_url('assets/employee/img/avatar1.png');
                                    }
                                    if ($info_user['genre'] =='') {
                                        echo site_url('assets/employee/img/user2-160x1601.jpg');
                                    }
                            
                                } else {
                                    echo site_url('assets/employee/img/'.$info_user['img_profil'].'');
                                }
                        
                            ?>" alt="<?=$info_user['nom'];?>">



                        <h3 class="profile-username text-center NameEdt">
                            <?=$info_user['pseudo'];?>
                        </h3>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                              <b>Nom:</b> 
                              <a class="pull-right" <?php if($info_user['genre'] == 1) {echo'
                      style="color: #f312e2!important;"';}?>><?=$info_user['nom']?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Prénoms:</b>
                              <a class="pull-right" <?php if($info_user['genre'] == 1) {echo'
                      style="color: #f312e2!important;"';}?>><?=$info_user['prenoms']?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Employé depuis:</b> 
                              <a class="pull-right" <?php if($info_user['genre'] == 1) {echo'
                      style="color: #f312e2!important;"';}?>>Le
                              <?php echo date('d/m/Y',$info_user['created_on']);?></a>

                              <?php
                                    
                                
                              ?>
                            </li>
                        </ul>
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
                               if($this->session->flashdata('message') !== null){
                                   echo '<div class="alert alert-success" role="alert">' .$this->session->flashdata('message').'</div>';
                               }
                                
                            ?>
                           
                            <form class="form-horizontal UpdateDetails">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Pseudo</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?=$info_user['pseudo']?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Nom</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="nom" value="<?=$info_user['nom']?>" placeholder="Nom" readonly>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="prenoms" value="<?=$info_user['prenoms']?>" placeholder="Prénoms" readonly>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Date de naissance</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="date_naissance" value="<?=$info_user['date_naissance']?>" placeholder="Date de naissance (exple: 11/07/1972)" readonly>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="lieu_naissance" value="<?=$info_user['Lieu_naissance']?>" placeholder="Lieu de naissance" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Poste</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="pseudo_parrain" value="<?=$monType?>" placeholder="Parrain" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" value="<?=$info_user['email']?>" placeholder="Email" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Téléphone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Numéro de téléphone" value="<?=$info_user['telephone']?>" placeholder="Mobile No." readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">Pays</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="pays" value="<?=$info_user['pays']?>" placeholder="Pays" readonly>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">Ville</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="ville" value="<?=$info_user['ville']?>" placeholder="Ville" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">Quartier</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="adresse" value="<?=$info_user['adresse']?>" placeholder="Quartier" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">A propos de moi</label>

                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="propos" placeholder="A propos de moi">
                                        
                                            <?=$info_user['apropos']?>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <a class="btn btn-primary" href="<?=base_url('administrator~gie2018/parametres_compte/modifier_profil');?>">Modifier mon profil</a>
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
