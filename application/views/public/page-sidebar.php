<div class="col-lg-3 widget-area ttm-bgcolor-grey">
    <aside class="widget widget-nav-menu">
        <ul class="widget-menu">
            <li <?php if ($this->uri->segment(1)=='investment-portfolio') {?>class="active" <?php }?>><a href="<?php echo site_url('investment-portfolio');?>">Investment Portfolio</a></li>
            <li <?php if ($this->uri->segment(1)=='business-to-customer-selling') {?>class="active" <?php }?>><a href="<?php echo site_url('business-to-customer-selling');?>">Business To Customer Selling</a></li>
            <li <?php if ($this->uri->segment(1)=='wallet-exchange-platform') {?>class="active" <?php }?>><a href="#">Wallet Exchange Platform (On Comming)</a></li>
            <li <?php if ($this->uri->segment(1)=='peer-to-peer-exchange-platform') {?>class="active" <?php }?>><a href="#">Peer To Peer Exchange Platform (On Comming)</a></li>
        </ul>
    </aside>
    <aside class="widget widget-download">
        <ul class="download">
            <li>
                <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-background-color-darkgrey ttm-icon_element-size-xs">
                    <i class="fa fa-file-pdf-o"></i>
                </div>
                <a href="#">Our White Paper</a>
            </li>
            <li>
                <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-background-color-darkgrey ttm-icon_element-size-xs">
                    <i class="fa fa-file-pdf-o"></i>
                </div>
                <a href="#">Investment Conditions</a>
            </li>
            <li>
                <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-background-color-darkgrey ttm-icon_element-size-xs">
                    <i class="fa fa-file-pdf-o"></i>
                </div>
                <a href="#">ShappInvest AML</a>
            </li>
        </ul>
    </aside>
    <aside class="widget post-widget">
        <h3 class="widget-title">Latest News</h3>
        <ul class="widget-post ttm-recent-post-list">
            <?php
                 if($articles==false)
                 {echo " Pas d'actualité pour le moment";}
                 else
                 {
                        foreach ($articles as $article) {
                    ?>
            <li>
                <a href="<?php echo site_url('single-blog/'.$article->id_article);?>"><img src="<?php echo site_url('assets/uploads/files/article_blogs/'.$article->img_article);?>" alt="post-img"></a>
                <span class="post-date"><?php echo date('M',$article->date_create).' '.date('d',$article->date_create).', '.date('Y',$article->date_create); ?></span>
                <a href="<?php echo site_url('single-blog/'.$article->id_article);?>" class="clearfix"><?=ucfirst(strtolower($article->titre_article))?></a>
            </li>
            <?php  } } ?>
            
        </ul>
    </aside>
    <aside class="widget contact-widget">
        <h3 class="widget-title">Get in touch</h3>
        <ul class="contact-widget-wrapper">
            <li><i class="fa fa-envelope-o"></i><a href="mailto:info@shappinvest.org" target="_blank">info@shappinvest.org</a></li>
            <li><i class="ti ti-alarm-clock"></i>Mon - Sat 8.00 - 18.00. Sunday CLOSED</li>
        </ul>
    </aside>

</div>
