 <!-- Content Header (Page header) -->     
<div class="content-header">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-md-block d-none">
            <h3 class="page-title br-0"><?php echo ucwords($titre); ?></h3>
        </div>
        
    </div>
</div>
<?php if($webinaires!=0){ ?>
<div class="row">
<?php foreach ($webinaires as $webinaire) { 

    $lien_img = 'assets/member/images/card/img1.jpg';
    if(!empty(trim($webinaire['img_article'])))
    {
        $lien_img = 'assets/images/webinaires/'.trim($webinaire['img_article']);
    }
?>
   <div class="col-4">
        <div class="news-slider">
            <div class="box">
                <img class="card-img-top img-responsive" src="<?=site_url($lien_img)?>" alt="<?=trim($webinaire['titre_article'])?>">
                <div class="box-body"> 
                    <div class="text-center">
                        <h4 class="box-title"><?=strtoupper(trim($webinaire['titre_article']))?></h4>
                        <p class="box-text"><?php if(strlen($webinaire['description_article']) > 100){ echo substr($webinaire['description_article'],0,  100).'...';}else{ echo $webinaire['description_article'];} ?></p>
                        <a href="<?php echo site_url(trim($this->session->userdata('language')).'/webin/'.$webinaire['id']);?>" class="btn btn-primary btn-sm"><?php echo ucfirst(get_phrase('read more')); ?></a>
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
       <h2 style="color: white;"><?=ucfirst(get_phrase("pas de webinaire en ligne"))?></h2>
    </div>
</div><br>
<?php } ?>