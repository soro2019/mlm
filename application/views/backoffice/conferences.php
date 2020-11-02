 <!-- Content Header (Page header) -->     
<div class="content-header">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-md-block d-none">
            <h3 class="page-title br-0"><?php echo ucwords($titre); ?></h3>
        </div>
        
    </div>
</div>

 <?php if($conferneces!=0){ ?>
<div class="row">
<?php foreach ($conferneces as $confernece) { 

    $lien_img = 'assets/member/images/card/img1.jpg';
    if(!empty(trim($confernece['img_article'])))
    {
        $lien_img = 'assets/images/conferneces/'.trim($confernece['img_article']);
    }
?>
   <div class="col-4">
        <div class="news-slider">
            <div class="box">
                <img class="card-img-top img-responsive" src="<?=site_url($lien_img)?>" alt="<?=trim($confernece['titre_article'])?>">
                <div class="box-body"> 
                    <div class="text-center">
                        <h4 class="box-title"><?=strtoupper(trim($confernece['titre_article']))?></h4>
                        <p class="box-text"><?php if(strlen($confernece['description_article']) > 100){ echo substr($confernece['description_article'],0,  100).'...';}else{ echo $confernece['description_article'];} ?></p>
                        <a href="<?php echo site_url(trim($this->session->userdata('language')).'/conf/'.$confernece['id']);?>" class="btn btn-primary btn-sm"><?php echo ucfirst(get_phrase('read more')); ?></a>
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
        <h2 style="color: white;"><?=ucfirst(get_phrase("pas de conférence en ligne"))?></h2>
    </div>
</div><br>
<?php } ?>