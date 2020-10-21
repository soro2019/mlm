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

<div class="site-main">
    <section class="ttm-row  ttm-bg ttm-bgimage-yes bg-img3 clearfix" style="padding-bottom:0px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div id="tracking-pre"></div>
                    <div id="tracking">

                        <div class="tracking-list">
                            <div class="tracking-item">
                                <div class="tracking-icon status-intransit">
                                     <i class="fa fa-check-circle success"></i> 
                                </div>
                                <div class="tracking-date">July 2020<span>First Quart</span></div>
                                <div class="tracking-content">LAUCH OF <b>SHAPPINVEST</b> - A SOURCE OF HAPPINESS INVESTMENT PLATFORM<span>FOR INVESTORS ALL AROUND THE WORLD WITH ROI AROUND 10% - 20% MONTHLY </span></div>
                            </div>
                            <div class="tracking-item">
                                <div class="tracking-icon status-intransit">
                                     <i class="fa fa-check-circle success"></i> 
                                </div>
                                <div class="tracking-date">July 2020<span>First Quart</span></div>
                                <div class="tracking-content">LAUCH OF <b>SHAPPMARKET</b> - A SOURCE OF HAPPINESS MARKETPLACE PLATFORM<span>FOR BUYERS AND SELLERS ALL AROUND THE WORLD</span></div>
                            </div>
                            <div class="tracking-item">
                                <div class="tracking-icon status-intransit">
                                     <i class="fa fa-check-circle inprogress"></i> 
                                </div>
                                <div class="tracking-date">July 2020<span>Second Quart</span></div>
                                <div class="tracking-content">MASS PROMOTION PHASE 1 OF <b>SHAPPMARKET</b> <span>IN UE, AMERICA, ASIA AND AFRICA.</span></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--blog-text-section-->
            <section class="ttm-row blog-text-section mt_120 res-991-mt-0 clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">

                            <div class="section-title style2 clearfix">
                                <div class="title-header">
                                    <h5>Our latest News</h5>
                                    <h2 class="title">Read Company News, Events &amp; Webinars</h2>
                                </div>
                                <div class="title-desc"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--blog-text-section end-->

            <!--blog-section-->
            <section class="ttm-row blog-section home-blog-section clearfix">
                <div class="container">
                    <div class="row">
                       <div class="post-slide owl-carousel owl-theme owl-loaded " data-item="3" data-nav="false" data-dots="false" data-auto="false">
                           <?php
                             if($articles==false)
                             {echo " Pas d'actualité pour le moment";}
                             else
                             {
                                foreach ($articles as $article) {
                            ?>
                                    <div class="featured-imagebox featured-imagebox-post box-shadow">
                                        <div class="featured-thumbnail">
                                            <img class="img-fluid" style='height: 240px !important; width: 100% !important;' src="<?php echo site_url('assets/uploads/files/article_blogs/'.$article->img_article);?>" alt="">
                                        </div>
                                        <div class="featured-content featured-content-post">
                                            <div class="post-title featured-title">
                                                <h5><a href="<?php echo site_url('single-blog/'.$article->id_article);?>"><?=ucfirst(strtolower($article->titre_article))?></a></h5>
                                            </div>
                                            <?php if(is_array($this->FronteModel->selectAvisByArticle($article->id_article))){$nbavis = count($this->FronteModel->selectAvisByArticle($article->id_article));}else{ $nbavis=0;}; ?>
                                            <div class="post-meta">
                                                <span class="ttm-meta-line"><i class="fa fa-calendar"></i><?php echo date('M',$article->date_create).' '.date('d',$article->date_create).', '.date('Y',$article->date_create); ?></span>
                                                <span class="ttm-meta-line"><i class="fa fa-comment"></i><?php echo $nbavis; ?>,comments</span>
                                            </div>
                                        </div>
                                    </div>
                            <?php  } } ?>
                        </div>
                    </div>
                </div>
                <br><br><br>
            </section>
            <!--blog-section end-->

</div>
