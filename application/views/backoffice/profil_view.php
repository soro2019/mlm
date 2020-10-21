

            <!-- Content Header (Page header) -->     
            <div class="content-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-md-block d-none">
                        <h3 class="page-title br-0"><?php echo ucwords($titre); ?></h3>
                    </div>
                    
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="box box-inverse bg-img" style="background-image: url(<?php echo site_url('assets/member/images/user-info.jpg');?>);" data-overlay="2">
                      

                      <div class="box-body text-center pb-50">
                        <a href="#">
                          <img class="avatar avatar-xxl avatar-bordered" src="<?php if($user['img_profil'] ==""){ echo site_url('assets/member/images/avatar/img_user_member.jpg');}else{
                            echo site_url('assets/member/images/avatar/'.$user['img_profil']);}?>" alt="<?=$user['nom'];?>">
                        </a>
                        <h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#"><?php echo strtoupper($nom_membre); ?>&nbsp;<?php echo strtoupper($prenom_membre); ?></a></h4>
                        <span><i class="fa fa-map-marker w-20"></i> Miami</span>
                      </div>

                      <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
                        <li>
                          <span class="opacity-60">Followers</span><br>
                          <span class="font-size-20">8.6K</span>
                        </li>
                        <li>
                          <span class="opacity-60">Following</span><br>
                          <span class="font-size-20">8457</span>
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
                    <li><a href="#Module" data-toggle="tab">Module</a></li>
                    <li><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>

                <div class="tab-content">

                <div class="tab-pane" id="Module">
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

                    

                      
                  </div>    
                  <!-- /.tab-pane -->

                  <div class="active tab-pane" id="activity">   
                    <div class="box p-15">              
                        <!-- Post -->
                        <div class="post">
                          <div class="user-block">
                            <img class="img-bordered-sm rounded-circle" src="../../images/user1-128x128.jpg" alt="user image">
                                <span class="username">
                                  <a href="#">Brayden</a>
                                  <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                                </span>
                            <span class="description">5 minutes ago</span>
                          </div>
                          <!-- /.user-block -->
                          <div class="activitytimeline">
                              <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.
                              </p>
                              <ul class="list-inline">
                                <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                                <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                </li>
                                <li class="pull-right">
                                  <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                    (5)</a></li>
                              </ul>
                              <form class="form-element">
                                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                             </form>
                          </div>
                        </div>
                        <!-- /.post -->
                        
                        <!-- Post -->
                       
                        <!-- /.post -->
                   </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">  
                    <div class="box p-15">      
                        <form class="form-horizontal form-element col-12">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputName" placeholder="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputEmail" placeholder="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPhone" class="col-sm-2 control-label">Phone</label>

                            <div class="col-sm-10">
                              <input type="tel" class="form-control" id="inputPhone" placeholder="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                            <div class="col-sm-10">
                              <textarea class="form-control" id="inputExperience" placeholder=""></textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputSkills" placeholder="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="ml-auto col-sm-10">
                              <div class="checkbox">
                                <input type="checkbox" id="basic_checkbox_1" checked="">
                                <label for="basic_checkbox_1"> I agree to the</label>
                                  &nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Terms and Conditions</a>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="ml-auto col-sm-10">
                              <button type="submit" class="btn btn-rounded btn-success">Submit</button>
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
                                <p>Email :<span class="text-gray pl-10">David@yahoo.com</span> </p>
                                <p>Phone :<span class="text-gray pl-10">+11 123 456 7890</span></p>
                                <p>Address :<span class="text-gray pl-10">123, Lorem Ipsum, Florida, USA</span></p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="pb-15">                     
                                <p class="mb-10">Social Profile</p>
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
                    <div class="widget-user-header bg-black" style="background: url('../../images/gallery/full/10.jpg') center center;">
                      <h3 class="widget-user-username">Michael Jorden</h3>
                      <h6 class="widget-user-desc">Designer</h6>
                    </div>
                    <div class="widget-user-image">
                      <img class="rounded-circle" src="../../images/user3-128x128.jpg" alt="User Avatar">
                    </div>
                    <div class="box-footer">
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="description-block">
                            <h5 class="description-header">12K</h5>
                            <span class="description-text">FOLLOWERS</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 br-1 bl-1">
                          <div class="description-block">
                            <h5 class="description-header">550</h5>
                            <span class="description-text">FOLLOWERS</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                          <div class="description-block">
                            <h5 class="description-header">158</h5>
                            <span class="description-text">TWEETS</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                  </div>

                <div class="box">
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
                </div>

              </div>
                                
              



        
                
                    

            

        
         
       
        
            