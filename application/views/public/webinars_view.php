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
                                    <a title="Homepage" href="<?php echo site_url();?>"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep">&nbsp; | &nbsp;</span>
                                <span><?=$page_title;?></span>
                            </div>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- page-title end-->


    <!--site-main start-->
    <div class="site-main">
        <!-- sidebar -->
        <div class="sidebar ttm-sidebar-right ttm-bgcolor-white clearfix">
            <div class="container">
                <!-- row -->
                <div class="row d-block">
                    <div class="col-lg-9 content-area pull-left">
                        <div class="container">
                            <!-- row -->
                            <div class="row">
                                <?php if(is_array($articles)){ foreach($articles as $article){ ?>
                                    <div class="col-md-6 col-lg-6">
                                        <!-- featured-imagebox-post -->
                                        <div class="featured-imagebox featured-imagebox-post box-shadow">
                                            <div class="featured-thumbnail">
                                                <img class="img-fluid" style='height: 240px !important; width: 100% !important;' src="<?php echo site_url('assets/uploads/files/article_blogs/'.$article->img_article);?>" alt="">
                                                <div class="featured-icon">
                                                    <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-background-color-skincolor ttm-icon_element-size-xs"> 
                                                        <i class="ti ti-pencil"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="featured-content featured-content-post">
                                                <div class="post-title featured-title">
                                                    <h5><a href="<?php echo site_url('single-blog/'.$article->id_article);?>"><?=ucfirst(strtolower($article->titre_article))?></a></h5>
                                                </div>
                                                <?php if(is_array($this->FronteModel->selectAvisByArticle($article->id_article))){$nbavis = count($this->FronteModel->selectAvisByArticle($article->id_article));}else{ $nbavis=0;} ?>
                                                <div class="post-meta">
                                                    <span class="ttm-meta-line"><i class="fa fa-calendar"></i><?php echo date('M',$article->date_create).' '.date('d',$article->date_create).', '.date('Y',$article->date_create); ?></span>
                                                    <span class="ttm-meta-line"><i class="fa fa-comment"></i><?php echo $nbavis; ?>,comments</span>
                                                </div>
                                            </div>
                                        </div><!-- featured-imagebox-post end -->
                                    </div>
                                <?php } } ?>
                            </div><!-- row end-->
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="ttm-pagination">
                                        <?php  echo $links; ?>
                                         <!--<span class="page-numbers current">1</span>
                                        <a class="page-numbers" href="#">2</a>
                                        <a class="next page-numbers" href="#"><i class="ti ti-arrow-right"></i></a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <?php require_once 'slidebarleft.php'; ?>
                </div><!-- row end -->

            </div>
        </div>
        <!-- sidebar end -->
    </div><!--site-main end-->