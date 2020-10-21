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


                        <img class="profile-user-img img-responsive img-circle profileImgUrl" src="<?=$user['img_profil'];?>" alt="<?=$user['nom'];?>">

                        <h3 class="profile-username text-center NameEdt">
                            <?=$user['nom'];?>
                        </h3>

                        <p class="text-muted text-center">Membre depuis
                            <?=$user['creele'];//date("m/d/y h:i:s a", $user['created']);//date('M. Y',strtotime() );?>
                        </p>

                        <a href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-block"><b>Upload Photo</b></a>

                        <p id="ErrorMessage" style="padding: 5px;"></p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom" id="element_overlap1">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#settings" data-toggle="tab">Changer de mot de passe</a></li>
                    </ul>
                    <div class="tab-content">
                        
                        <div class="active tab-pane" id="settings">
                            <form class="form-horizontal ChangePassword" action="<?=base_url('profile-password-update');?>">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Old Password</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" required id="Old" placeholder="Old Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">New Password</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" required id="New" placeholder="New Password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail" required class="col-sm-2 control-label">Confirm Password</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" required id="Confirm" placeholder="Confirm Password">
                                    </div>
                                </div>

                                <div class="form-group"><label for="" required class="col-sm-2 control-label">&nbsp;</label>
                                    <p id="ErrorMessageP"></p>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">

                                        <button type="submit" class="btn btn-info ChangePassword">Update</button>
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
