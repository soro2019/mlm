      <div class="col-lg-3 widget-area ttm-bgcolor-grey pull-right">
                        <aside class="widget widget-search">
                            <form role="search" method="get" class="search-form  box-shadow" action="#">
                                <label>
                                <span class="screen-reader-text">Search for:</span>
                                <i class="fa fa-search"></i>
                                <input type="search" class="input-text" placeholder="Search …" value="" name="s">
                                </label>
                            </form>
                        </aside>
                        <aside class="widget widget-text">
                            <div class="ttm-author-widget">
                                <div class="author-widget_img">
                                    <img class="author-img" src="<?php echo site_url('assets/front/images/Logo-shapp-invest.png');?>" alt="author image" style="    border-radius: 0%;">
                                </div>
                                <h4 class="author-name">Shappinvest-author</h4>
                                <p class="author-widget_text">As a business consultant, we focus on delivering quantifiable results for our customers, based on a well tested methodology and solid experience.</p>
                                <span class="about-autograph">
                                    <img class="author-img" src="<?php echo site_url('assets/front/images/author-widget-sign.png');?>" alt="author image">
                                </span>
                            </div>
                        </aside>
                        <?php if(count($categories) > 0){ ?>
                        <aside class="widget widget-categories">
                            <h3 class="widget-title">Categories</h3>
                            <ul>
                             <?php foreach ($categories as $categorie){ 

                               $t = $this->FronteModel->countArticleByCategory($categorie->id);

                            ?>
                                <li><a href="#"><?=$categorie->lib_cate?></a><span><?=countElement($categorie->id, $t);?></span></li>
                             <?php } ?>
                            </ul>
                        </aside>
                        <?php } ?>
                        <?php if(count($latestNews) > 0){ ?>
                        <aside class="widget post-widget">
                            <h3 class="widget-title">Latest News</h3>
                            <ul class="widget-post ttm-recent-post-list">
                              <?php foreach ($latestNews as $latestNew){ ?>
                                <li>
                                    <a href="<?=site_url('single-blog/'.$latestNew->id_article)?>">
                                        <img  style="width: 70px !important; height: 70px !important;" src="<?php echo site_url('assets/uploads/files/article_blogs/'.$latestNew->img_article);?>" alt="post-img">
                                    </a>
                                    <span class="post-date"><?php echo date('d',$latestNew->date_create).' '.date('M',$latestNew->date_create).','.date('Y',$latestNew->date_create); ?></span>
                                    <a href="<?=site_url('single-blog/'.$latestNew->id_article)?>" class="clearfix"><?php echo ucfirst(strtolower($latestNew->titre_article)); ?></a>
                                </li>
                              <?php } ?>
                            </ul>
                        </aside>
                        <?php } ?>
                        <aside class="widget contact-widget">
                            <h3 class="widget-title">Get in touch</h3>      
                            <ul class="contact-widget-wrapper">
                                <li><i class="fa fa-map-marker"></i>Shappinvest Business 24 Fifth st., Los Angeles, USA</li>
                                <li><i class="fa fa-envelope-o"></i><a href="mailto:info@example.com" target="_blank">info@example.com</a></li>
                                <li><i class="fa fa-phone"></i>(+01) 123 456 7890</li>
                                <li><i class="ti ti-alarm-clock"></i>Mon - Sat 8.00 - 18.00. Sunday CLOSED</li>
                            </ul>
                        </aside>
                        <?php if(count($categories) > 0){ ?>
                        <aside class="widget tagcloud-widget">
                            <h3 class="widget-title">Tags</h3>
                            <div class="tagcloud">
                                <?php foreach ($categories as $categorie){ ?>
                                 <a href="#" class="tag-cloud-link"><?=$categorie->lib_cate?></a>
                                <?php } ?>
                            </div>
                        </aside>
                        <?php } ?>
                    </div>