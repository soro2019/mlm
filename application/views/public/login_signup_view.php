<!-- page-title -->
<div class="ttm-page-title-row">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-box ttm-textcolor-white">
                    <div class="page-title-heading">
                        <h1 class="title"><?=$page_title;?></h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumb-wrapper">
                        <span>
                            <a title="Homepage" href="<?php echo site_url();?>"><i class="ti ti-home"></i>&nbsp;&nbsp;<?=get_phrase('Home')?></a>
                        </span>
                        <span class="ttm-bread-sep">&nbsp; | &nbsp;</span>
                        <span><?=get_phrase($page_title);?></span>
                    </div>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- page-title end-->
<!--site-main start-->
<div class="site-main pt-20">
    <!-- map-section -->
    <div class="ttm-row map-section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="logreg-forms">
                        <?php if ($this->session->flashdata('message')) { ?>
                            <div class="alert alert-warning alert-dismissible" role="alert" >
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?php echo $this->session->flashdata('message');?>
                            </div>
                        <?php 
                        }
                        $attributes = array("class" => "form-signin",
                        "role" => "form",
                        "name" => "");
                        echo form_open("", $attributes);
                        ?>
                        <h1 class="h3 mb-3 font-weight-normal" style="text-align: center; margin-bottom:15px;color:#02799c;"> <?=ucfirst(get_phrase('sign in'))?></h1>
                        <div class="input-group">
                            <input type="text" id="inputEmail" class="form-control" placeholder="<?=ucfirst(get_phrase('votre pseudo'))?>" required="" autofocus="" name="identity">
                        </div>
                        <div class="input-group">
                            <input type="password" id="inputPassword" class="form-control" placeholder="<?=ucfirst(get_phrase('votre mot de passe'))?>" required="" name="password">
                        </div>
                        <button class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-icon-btn-right ttm-btn-bgcolor-skincolor" title=""><?=ucfirst(get_phrase('sign in'))?></button>
                        <a href="#" id="forgot_pswd" style="text-align: left; color:#0b0c26;"><?=ucfirst(get_phrase('forgot password'))?>?</a>
                        <hr>
                        <!-- <p>Don't have an account!</p>  -->
                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-icon-btn-right ttm-btn-bgcolor-skincolor" href="<?php echo site_url(trim($_SESSION['language']));?>/registration" title=""><?=get_phrase('Sign up New Account')?></a>
                        <?php echo form_close() ; ?>
                        <form action="" class="form-reset">
                            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center; margin-bottom:15px;color:#02799c;"><?=ucwords(get_phrase('reset password'))?></h1>
                            <input type="email" id="resetEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                            <button class="btn btn-primary btn-block" type="submit" style="background-color:#02799c;border-color:#02799c"><?=ucwords(get_phrase('reset password'))?></button>
                            <a href="#" id="cancel_reset"  style="text-align: left; color:#0b0c26;"><i class="fa fa-angle-left"></i> <?=ucfirst(get_phrase('retour'))?></a>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- map-section end -->
</div>
<!--site-main end-->