            <!-- Content Header (Page header) -->     
            <div class="content-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-md-block d-none">
                        <h3 class="page-title br-0"><?php echo ucwords($titre); ?></h3>
                    </div>
                    
                </div>
            </div>
            <?php 

          if(empty($user['first_name']) || empty($user['last_name']) || empty($user['genre']) || empty($user['Lieu_naissance']) || empty($user['date_naissance']) || empty($user['pays']) || empty($user['phone']) || empty($user['ville']) || empty($user['region']) /*|| empty($membre['code_postal'])*/){ ?>
                   <div class="col-xl-12 col-12">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="alert alert-danger alert-dismissible">
                                    <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
                                    <h4>
                                    <i class="icon fa fa-check"></i><?=get_phrase('Information')?>
                                    </h4>
                                    <a href="<?=site_url(trim($_SESSION['language']).'/backoffice/my-info')?>" style="text-decoration: none;"><?=ucfirst(get_phrase('pour bénéficier entièrement des avantages du réseau merci de compléter vos informations'));?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            <div class="row">
                <div class="col-12">
                    <div class="box box-inverse bg-img" style="background-image: url(<?php echo site_url('assets/member/images/user-info.jpg');?>);" data-overlay="2">
                      

                      <div class="box-body text-center pb-50">
                        <a href="#">
                          <img class="avatar avatar-xxl avatar-bordered" src="<?php if($user['img_profil'] ==""){ echo site_url('assets/member/images/avatar/img_user_member.jpg');}else{
                            echo site_url('assets/member/images/avatar/'.$user['img_profil']);}?>" alt="<?=$user['first_name'];?>">
                        </a>
                        <h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#"><?php echo strtoupper($nom_membre); ?>&nbsp;<?php echo strtoupper($prenom_membre); ?></a></h4>
                        <span><i class="fa fa-map-marker w-20"></i> <?=trim($user['ville']);?>, <?php echo trim($this->Crud_model->selectPaysById($user['pays']));?></span>
                      </div>

                      <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
                        <li>
                          <span class="opacity-60">Followers</span><br>
                          <span class="font-size-20">8.6K</span>
                        </li>
                        <li>
                          <span class="opacity-60"><?=ucfirst(get_phrase('mes filleuls'))?></span><br>
                          <span class="font-size-20"><?=$membrereseauperso?></span>
                        </li>
                        <li>
                          <span class="opacity-60">Tweets</span><br>
                          <span class="font-size-20">2154</span>
                        </li>
                      </ul>
                    </div>
                </div>
            <div class="col-12 col-lg-7 col-xl-8">              
              <div class="nav-tabs-custom box-profile">
                <ul class="nav nav-tabs">
                   <!--  <li><a href="#Module" data-toggle="tab">Module</a></li> -->
                    <li><a href="#settings" data-toggle="tab"><?=ucwords(get_phrase('profil settings'))?></a></li>
                </ul>

                <div class="tab-content">

                <!-- <div class="tab-pane" id="Module">
                    <div class="publisher publisher-multi bg-white b-1 mb-30">
                      <textarea class="publisher-input auto-expand" rows="4" placeholder="Write something"></textarea>
                      <div class="flexbox">
                        <div class="gap-items">
                          <span class="publisher-btn file-group">
                            <i class="fa fa-image file-browser"></i>
                            <input type="file">
                          </span>
                          <a class="publisher-btn" href="#"><i class="fa fa-map-marker"></i></a>
                          <a class="publisher-btn" href="#"><i class="fa fa-smile-o"></i></a>
                        </div>

                        <button class="btn btn-sm btn-bold btn-primary">Post</button>
                      </div>
                    </div> 
                  </div>   -->  

                  <div class="tab-pane active" id="settings">  
                    <div class="box p-15">      
                        <form class="form-horizontal form-element col-12" method="POST" action="">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 control-label"><?=ucfirst(get_phrase('nom'))?></label>

                            <div class="col-sm-10">
                              <input type="text" name="first_name" class="form-control" id="inputName" value="<?=trim($user['first_name']);?>">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 control-label"><?=ucfirst(get_phrase('prenom'))?></label>

                            <div class="col-sm-10">
                              <input type="text" name="last_name" class="form-control" id="inputName" value="<?=trim($user['last_name']);?>">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 control-label"><?=ucfirst(get_phrase('date naissance'))?></label>

                            <div class="col-sm-10">
                              <input type="date" name="date_naissance" class="form-control" id="inputName" value="<?=trim($user['date_naissance']);?>">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 control-label"><?=ucfirst(get_phrase('lieu naissance'))?></label>

                            <div class="col-sm-10">
                              <input type="text" name="Lieu_naissance" class="form-control" id="inputName" value="<?=trim($user['Lieu_naissance']);?>">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 control-label"><?=ucfirst(get_phrase('genre'))?></label>

                            <div class="col-sm-10">
                              <select name="genre" class="form-control" id="w3-don" required="">
                                  <option value="H" <?= $user['genre'] == 'H' ? 'selected':'' ?> ><?= get_phrase("Homme") ?></option>
                                  <option value="F" <?= $user['genre'] == 'F' ? 'selected':'' ?> ><?=get_phrase("Femme") ?></option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 control-label"><?=ucfirst(get_phrase('email'))?></label>

                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputEmail" value="<?=trim($user['email']);?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPhone" class="col-sm-2 control-label"><?=ucfirst(get_phrase('phone'))?></label>

                            <div class="col-sm-10">
                              <input type="tel" name="phone" class="form-control" id="inputPhone" value="<?=trim($user['phone']);?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 control-label"><?=ucfirst(get_phrase('code postal'))?></label>

                            <div class="col-sm-10">
                               <input type="tel" name="code_postal" class="form-control" id="inputPhone" value="<?=trim($user['code_postal']);?>">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 control-label"><?=ucfirst(get_phrase('pays'))?></label>

                            <div class="col-sm-10">
                              <input name="pays" type="text" list="pays" class="form-control" id="inputSkills"  value="<?php if(isset($_POST['pays'])){ echo $_POST['pays'];}else{ echo trim($this->Crud_model->selectPaysById($user['pays'])); } ?>">
                                <datalist id="pays">
                                   <?php foreach ($listepays as $elmt) {?>
                                     <option value="<?=$elmt['name']?>"></option>
                                   <?php } ?>
                                </datalist>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 control-label"><?=ucfirst(get_phrase('ville'))?></label>

                            <div class="col-sm-10">
                              <input type="text" name="ville" class="form-control" id="inputSkills" value="<?=trim($user['ville']);?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 control-label"><?=ucfirst(get_phrase('region'))?></label>

                            <div class="col-sm-10">
                              <input type="text" name="region" class="form-control" id="inputSkills" value="<?=trim($user['region']);?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="ml-auto col-sm-10">
                              <button type="submit" class="btn btn-rounded btn-primary"><?=ucfirst(get_phrase('modifier'))?></button>
                            </div>
                          </div>
                        </form>
                    </div>            
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
              <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->      

              <div class="col-12 col-lg-5 col-xl-4">
                <div class="box">
                    <div class="box-body box-profile">            
                      <div class="row">
                        <div class="col-12">
                            <div>
                                <p><?=ucwords(get_phrase('email'))?> :<span class="text-gray pl-10"><?=trim($user['email'])?></span> </p>
                                <p><?=ucwords(get_phrase('phone'))?> :<span class="text-gray pl-10"><?=trim($user['phone'])?></span></p>
                                <p><?=ucwords(get_phrase('adresse'))?> :<span class="text-gray pl-10"><?=trim($user['ville']);?>, <?php echo trim($this->Crud_model->selectPaysById($user['pays']));?></span></p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="pb-15">                     
                                <p class="mb-10"><?=ucwords(get_phrase('social profile'))?></p>
                                <?php $social_reseau = json_decode($user['social_reseau']); ?>
                                <div class="user-social-acount">
                                    <button class="btn btn-circle btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></button>
                                    <button class="btn btn-circle btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></button>
                                    <button class="btn btn-circle btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></button>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  
                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <!-- <div class="widget-user-header bg-black" style="background: url('../../images/gallery/full/10.jpg') center center;">
                      <h3 class="widget-user-username">Michael Jorden</h3>
                      <h6 class="widget-user-desc">Designer</h6>
                    </div> -->
                   <!--  <div class="widget-user-image">
                      <img class="rounded-circle" src="../../images/user3-128x128.jpg" alt="User Avatar">
                    </div> -->
                  </div>

                <!-- <div class="box">
                    <div class="box-body">
                        <div class="flexbox align-items-baseline mb-20">
                          <h6 class="text-uppercase ls-2">Friends</h6>
                          <small>20</small>
                        </div>
                        <div class="gap-items-2 gap-y">
                          <a class="avatar" href="#"><img src="../../images/avatar/1.jpg" alt="..."></a>
                          <a class="avatar" href="#"><img src="../../images/avatar/3.jpg" alt="..."></a>
                          <a class="avatar" href="#"><img src="../../images/avatar/4.jpg" alt="..."></a>
                          <a class="avatar" href="#"><img src="../../images/avatar/5.jpg" alt="..."></a>
                          <a class="avatar" href="#"><img src="../../images/avatar/6.jpg" alt="..."></a>
                          <a class="avatar" href="#"><img src="../../images/avatar/7.jpg" alt="..."></a>
                          <a class="avatar" href="#"><img src="../../images/avatar/8.jpg" alt="..."></a>
                          <a class="avatar avatar-more" href="#">+15</a>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a class="text-uppercase d-blockls-1 text-fade" href="#">Invite People</a>
                    </div>
                </div>

                <div class="box box-inverse" style="background-color: #3b5998">
                  <div class="box-header no-border">
                    <span class="fa fa-facebook font-size-30"></span>
                      <div class="box-tools pull-right">
                        <h5 class="box-title box-title-bold">Facebook feed</h5>
                      </div>
                  </div>

                  <blockquote class="blockquote blockquote-inverse no-border m-0 py-15">
                    <p>Holisticly benchmark plug imperatives for multifunctional deliverables. Seamlessly incubate cross functional action.</p>
                    <div class="flexbox">
                      <time class="text-white" datetime="2017-11-21 20:00">21 November, 2017</time>
                      <span><i class="fa fa-heart"></i> 75</span>
                    </div>
                  </blockquote>
                </div> -->

              </div>
                                
              



        
                
                    

            

        
         
       
        
            