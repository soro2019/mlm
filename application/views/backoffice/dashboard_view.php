            <style type="text/css">
                .theme-purple a:hover, .theme-purple a:active, .theme-purple a:focus {
                    color: white !important;
                }
            </style>


            <!-- Content Header (Page header) -->     
            <div class="content-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-md-block d-none">
                        <h3 class="page-title br-0"><?php echo ucwords($titre); ?></h3>
                    </div>
                    
                </div>
            </div>
            
            <div class="row">
                <?php if(empty($membre['first_name']) || empty($membre['last_name']) || empty($membre['genre']) || empty($membre['Lieu_naissance']) || empty($membre['date_naissance']) || empty($membre['pays']) || empty($membre['phone']) || empty($membre['ville']) || empty($membre['region']) || empty($membre['code_postal'])){ ?>
                   <div class="col-xl-12 col-12">
                    <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4>
                                    <i class="icon fa fa-check"></i><?=get_phrase('Information')?>
                                    </h4>
                                    <a href="<?=site_url(trim($_SESSION['language']).'/backoffice/my-info')?>" style="text-decoration: none;"><?=get_phrase('Pour bénéficier entièrement des avantages du réseau merci de compléter vos informations');?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <div class="col-md-12 col-12">
                    <div class="box box-solid bg-primary">
                        <div class="box-header" style="background-color: #f25e24!important;border-color:#f25e24!important">
                            <h4 class="box-title"><strong><?php echo get_phrase('My link for sponsoring'); ?></strong></h4>
                        </div>
                        <div class="box-body">
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="input-group">
                                            <input id="to-copy" type="text" class="form-control" value="<?php echo site_url('registration/');?><?php echo $pseudo; ?>" readonly="readonly">
                                            <span class="input-group-btn">
                                                <button id="copy" class="btn btn-default" type="button">
                                                  <?php echo get_phrase('copier'); ?>  
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                                
            <script type="text/javascript">
                function copy() {
                  var copyText = document.querySelector("#to-copy");
                  copyText.select();
                  document.execCommand("copy");
                }

                document.querySelector("#copy").addEventListener("click", copy);
            </script>       
       
        
            