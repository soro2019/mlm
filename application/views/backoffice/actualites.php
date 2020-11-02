 <!-- Content Header (Page header) -->     
<div class="content-header">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-md-block d-none">
            <h3 class="page-title br-0"><?php echo ucwords($titre); ?></h3>
        </div>
        
    </div>
</div>
<?php if($actualites!=0){ ?>
<div class="row">
<?php foreach ($actualites as $actualite) { 

    $lien_img = 'assets/member/images/card/img1.jpg';
    if(!empty(trim($actualite['img_article'])))
    {
        $lien_img = 'assets/images/actualites/'.trim($actualite['img_article']);
    }
?>
   <div class="col-4">
        <div class="news-slider">
            <div class="box">
                <img class="card-img-top img-responsive" src="<?=site_url($lien_img)?>" alt="<?=trim($actualite['titre_article'])?>">
                <div class="box-body"> 
                    <div class="text-center">
                        <h4 class="box-title"><?=strtoupper(trim($actualite['titre_article']))?></h4>
                        <p class="box-text"><?php if(strlen($actualite['description_article']) > 100){ echo substr($actualite['description_article'],0,  100).'...';}else{ echo $actualite['description_article'];} ?></p>
                        <a href="<?php echo site_url(trim($this->session->userdata('language')).'/actu/'.$actualite['id']);?>" class="btn btn-primary btn-sm"><?php echo ucfirst(get_phrase('read more')); ?></a>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
   </div>
<?php } ?>
</div><br>
<?php }else{ ?>

<div class="row">
    <div class="col-md-12">
        <h2><?=ucfirst(get_phrase("actualités"))?></h2>
    </div>
</div><br>
<?php } ?>