<div class="content-header">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-md-block d-none">
            <h3 class="page-title br-0"><?php echo ucwords($titre); ?></h3>
        </div>
        
    </div>
</div>
 <?php
   if($this->session->flashdata('message_erreur') !== null){
       echo '<div class="alert alert-danger" role="alert">Erreur: ' .$this->session->flashdata('message_erreur').'</div>';
   }
     
   elseif(validation_errors() !== ''){
       echo '<div class="alert alert-danger" role="alert">Erreur: ' .validation_errors().'</div>';
   }
 ?>
<br><div class="row">
    <div class="col-12">	
		<div class="box">
			<div class="box-header">
				<h4 class="box-title"><?=ucfirst(get_phrase('sélectionnez votre produit de base'))?></h4>
			</div>
		</div>
	</div>
	<?php if($products != 0 && is_array($products)){ ?>
	  <?php foreach ($products as $product) { 

	  	$lien_img = 'assets/member/images/card/img1.jpg';
        if(!empty(trim($product['image'])))
        {
          $lien_img = 'assets/images/produits/'.trim($product['image']);
        }
	  ?>
		<div class="col-4">	
			<div class="news-slider">
				<div class="box">
					<img class="card-img-top img-responsive" src="<?=site_url($lien_img)?>" alt="Card image cap">
					<div class="box-body"> 
						<div class="text-center">
							<h4 class="box-title" style="color: orange; font-weight: bold;"><?php echo trim($product['name']); ?> | <?php echo number_format(trim($product['prix_vente']), 0, ' ', ' ');?> $</h4>
							<!-- <p class="box-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
							<p><a href="#" data-backdrop="static" data-toggle="modal" class="btn btn-primary" data-target="#achatp" data-toggle="modal" onclick="infoachat(<?=trim($product['id'])?>)">
                                   <?=ucfirst(get_phrase("acheter"))?>
                                 </a></p>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</div>
	<?php } } ?>
</div>

  <div class="modal center-modal fade" id="achatp" tabindex="-1">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title"><?=ucfirst(get_phrase('procéder à l\'achat'))?></h5>
	        <button type="button" class="close" data-dismiss="modal">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div id="infoachat">
	         
	      </div>
	      <div class="modal-footer modal-footer-uniform">
	        <button style="float: right;" type="button" class="btn btn-danger" data-dismiss="modal"><?=ucfirst(get_phrase('fermer'))?></button>
	      </div>
	    </div>
	  </div>
 </div>