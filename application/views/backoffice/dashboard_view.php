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
                <div class="col-xl-12 col-12">
                    <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4>
                                    <i class="icon fa fa-check"></i><?=get_phrase('Information')?>
                                    </h4>
                                    <a href="" style="text-decoration: none;"><?=get_phrase('Pour bénéficier entièrement des avantages du réseau merci de compléter vos informations');?></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-6 col-12">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="box bg-info">
                                <div class="box-body">
                                    <div class="text-center fd-box">
                                        <p>Montant invertistment pack</p>
                                        <h1><i class="mdi mdi-hamburger font-size-30"></i>$1,201</h1>
                                        
                                    </div>
                                    <div>
                                        <span class="float-right"><a class="btn btn-xs btn-primary" href="#" style="background-color: #f25e24!important;border-color:#f25e24!important">Acher un pack</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-12">
                            <div class="box bg-success">
                                <div class="box-body">
                                    <div class="text-center fd-box">
                                        <p>Solde</p>
                                        <h1><i class="mdi mdi-wallet font-size-30"></i>
                                        $11,254</h1>
                                        
                                    </div>
                                                                        <div>
                                        <span class="float-right"><a class="btn btn-xs btn-primary" href="#" style="background-color: #f25e24!important;border-color:#f25e24!important">View</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="box bg-danger">
                                <div class="box-body">
                                    <div class="text-center fd-box">
                                        <p>Total Order Received</p>
                                        <h1><i class="mdi mdi-basket font-size-30"></i>
                                        $1,254</h1>
                                        
                                    </div>
                                                                        <div>
                                        <span class="float-right"><a class="btn btn-xs btn-primary" href="#" style="background-color: #f25e24!important;border-color:#f25e24!important">View</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="box">
                                <div class="box-header">
                                  <h4 class="box-title">Revenue Report</h4>
                                </div>                                                  
                                <div class="box-body">
                                  <div class="flexbox align-items-center justify-content-between d-md-flex d-block">
                                      <div>
                                        <h4 class="font-weight-700 text-dark">$125,498,894</h4>
                                        <h6 class="text-fade">Earning </h6>
                                      </div>
                                      <div>
                                        <h4 class="font-weight-700 text-info">$41,832,964&nbsp;</h4>
                                        <h6 class="text-fade">Markham</h6>
                                      </div>
                                      <div>
                                        <h4 class="font-weight-700 text-success">$32,749,448</h4>
                                        <h6 class="text-fade">Neglinnaya</h6>
                                      </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Total Earnings</h4>
                        </div>
                        <div class="box-body">
                            <div id="total-earning" class="h-400"></div>
                        </div>
                    </div>
                </div>
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
       
        
            