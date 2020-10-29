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
<br>
<div class="row">
 <div class="col-12">
			  <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title"><?=ucwords(get_phrase('historique des transactions'));?></h3>
				  <h6 class="box-subtitle"><?=ucfirst(get_phrase('export data excel and pdf'))?></h6>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="row">
					  <div class="col-sm-3">
					  	<label><?=ucfirst(get_phrase('specifiez le mois'))?></label>
					  	<select class="form-control" name="mois" id='mois'>
					  		<option value=""><?=ucfirst(get_phrase('specifiez le mois'))?></option>
					  		<?php foreach (lesMois() as $mois) { ?>
					  		  <option value="<?=$mois?>"><?=ucfirst($mois).' '.date('Y')?></option>
					  		<?php } ?>
					  	</select>
					  </div>
					  <div class="col-sm-6">
					  	<label><?=ucfirst(get_phrase('type opération'))?></label>
					  	<select class="form-control" name="type" id='type'>
					  		<option value=""><?=ucfirst(get_phrase('type opération'))?></option>
					  		<?php foreach ($typeOp as $type) { ?>
					  		  <option value="<?=$type['id']?>"><?=ucfirst($type['lib'])?></option>
					  		<?php } ?>
					  	</select>
					  </div>
					  <div class="col-sm-3">
					  	<label><?=ucfirst(get_phrase('pseudo du receveur'))?></label>
					  	 <input type="text" id="pseudo_r" name="pseudo_r" class="form-control">
					  </div>
					</div><br><br>
					<div class="table-responsive">
					  <table id="operation-table" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
						<thead>
							<tr>
								<th>N<sup>o</sup></th>
								<th><?=ucfirst(get_phrase('type opération'))?></th>
								<th><?=ucfirst(get_phrase('montant'))?></th>
								<th><?=ucfirst(get_phrase('motif'))?></th>
								<th><?=ucfirst(get_phrase('date'))?></th>
								<th><?=ucfirst(get_phrase('receveur'))?></th>
							</tr>
						</thead>
						<tbody>
						</tbody>				  
					</table>
					</div>              
				</div>
				<!-- /.box-body -->
			  </div>
 </div>
</div>