 <!--page-title -->
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
                    <?php foreach ($articles as $article){
                        } ?>
                    <div class="col-lg-9 content-area pull-left">
                        <article class="post ttm-blog-classic">
                           <div class="featured-imagebox featured-imagebox-post">
                                <div class="featured-thumbnail">
                                    <img class="img-fluid" style="width: 100% !important;"  src="<?php echo site_url('assets/uploads/files/article_blogs/'.$article->img_article);?>" alt="">
                                    <div class="featured-icon">
                                        <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-background-color-skincolor ttm-icon_element-size-xs">
                                            <i class="ti ti-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="featured-content featured-content-post">
                                    <div class="post-meta">
                                        <span class="ttm-meta-line"><i class="fa fa-calendar"></i><?php echo date('M',$article->date_create).' '.date('d',$article->date_create).', '.date('Y',$article->date_create); ?></span>
                                        <span class="ttm-meta-line"><i class="fa fa-comment"></i><?php if($avisForArticle!==false){ echo count($avisForArticle);}else{ echo 0;}?>, comments</span>
                                    </div>
                                    <div class="separator">
                                        <div class="sep-line solid mt-10 mb-20"></div>
                                    </div>
                                    <div class="featured-desc">
                                      <?php echo $article->description_article; ?>
                                    </div>
                                </div>
                            </div>
                             <div class="separator">
                                <div class="sep-line solid mt-30 mb-30"></div>
                            </div>
                            <div class="clearfix">
                                <div class="social-icons circle social-hover pull-left res-767-fnone">
                                    <div class="ttm-social-share-title d-inline-block">
                                        <h5> Share This Projects</h5>
                                    </div>
                                    <ul class="list-inline mb-0 d-inline-block">
                                        <li class="social-facebook"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li class="social-twitter"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li class="social-linkedin"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                                <div class="ttm-tag-list pull-right res-767-fnone">
                                    <span>
                                      <?php if(!empty($lescategoriesArticle)){ foreach($lescategoriesArticle as $value) { 

                                        $namecate = $this->FronteModel->lescategoriesArticle($value);
                                        //var_dump($namecate);die;
                                      ?>
                                        <a href="#"><?php echo $namecate->lib_cate;?></a>
                                      <?php } } ?>
                                    </span>
                                </div>
                            </div>
                            <div class="ttm-blog-classic-content single-blog">
                                <div class="ttm-blog-classic-box-comment">
                                    <div id="comments" class="comments-area">
                                        <h2 class="comments-title"><?php if($avisForArticle!==false){  echo count($avisForArticle);}else{ echo 0;}?> Replies to “<?php echo ucfirst(strtolower($article->titre_article)) ; ?>”</h2>
                                        <?php if(is_array($avisForArticle) && count($avisForArticle) > 0){ ?>
                                         <ol class="comment-list">
                                            <?php foreach ($avisForArticle as $avisForArticle){ ?>
                                             <li>
                                                <div class="comment-body">
                                                    <div class="comment-author vcard">
                                                        <img src="<?=site_url('assets/uploads/files/article_blogs/User_Avatar_2.png')?>" class="avatar" alt="comment-img">
                                                    </div>
                                                    <div class="comment-box">
                                                        <div class="comment-meta commentmetadata">
                                                            <cite class="ttm-comment-owner"><?=ucfirst(strtolower($avisForArticle->nom_visiteur)) ?></cite>
                                                            <a href="#"><?php echo date('M',$avisForArticle->date_poste).' '.date('d',$avisForArticle->date_poste).', '.date('Y',$avisForArticle->date_poste); ?> at <?php echo date('H:s',$article->date_create); ?></a>
                                                        </div>
                                                        <div class="author-content-wrap">
                                                            <p><?=ucfirst(strtolower($avisForArticle->message_visiteur)) ?></p>
                                                        </div>
                                                        <!-- <div class="reply">
                                                            <a rel="nofollow" class="comment-reply-link" href="#">Reply</a>
                                                        </div> -->
                                                    </div>
                                                </div>
                                             </li>
                                            <?php } ?>
                                            <!-- <li class="children comment">
                                                <div class="comment-body">
                                                    <div class="comment-author vcard">
                                                        <img src="images/blog/blog-comment-02.jpg" class="avatar" alt="comment-img">
                                                    </div>
                                                    <div class="comment-box">
                                                        <div class="comment-meta">
                                                            <cite class="ttm-comment-owner">Cherieh</cite>
                                                            <a href="#">February 14, 2019 at 8:42 am</a>
                                                        </div>
                                                        <div class="author-content-wrap">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium eius, sunt porro corporis maiores ea, voluptatibus omnis maxime</p>
                                                        </div>
                                                        <div class="reply">
                                                            <a rel="nofollow" class="comment-reply-link" href="#">Reply</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li> -->
                                        </ol>
                                       <?php } ?>
                                        <div class="comment-respond">
                                            <h3 class="comment-reply-title">Leave a Reply</h3>
                                            <form action="" method="post" id="commentform" class="comment-form">
                                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                                <p class="comment-notes">Your email address will not be published. </p>
                                                <p class="comment-form-comment">
                                                    <textarea id="comment" placeholder="Comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                                </p>
                                                <p class="comment-form-author">
                                                    <input id="author" placeholder="Name (required)" name="author" type="text" value="" size="30" aria-required="true">
                                                </p>
                                                <p class="comment-form-email">
                                                    <input id="email" placeholder="Email (required)" name="email" type="text" value="" size="30" aria-required="true">
                                                </p>
                                                 <input name="idarticle" type="hidden" value="<?=$article->id_article?>">
                                                <!-- <p class="comment-form-url">
                                                    <input id="url" placeholder="Website" name="url" type="text" value="" size="30">
                                                </p> -->
                                                <!-- <p class="comment-form-cookies-consent">
                                                    <input id="comment-cookies-consent" name="comment-cookies-consent" type="checkbox" value="yes">
                                                    <label for="comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label>
                                                </p> -->
                                                <p class="form-submit pt-20">
                                                    <input name="submit" type="submit" id="submit" class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-btn-bgcolor-skincolor" value="Post Comment">
                                                </p>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                   <?php require_once 'slidebarleft.php'; ?>
                </div><!-- row end -->

            </div>
        </div>
        <!-- sidebar end -->
    </div><!--site-main end