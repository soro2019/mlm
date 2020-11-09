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
				  <!-- <h6 class="box-subtitle"><?=ucfirst(get_phrase('export data excel and pdf'))?></h6> -->
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
					  		<option value=""><?=ucfirst(get_phrase('selectionner une opération'))?></option>
					  		<?php foreach ($typeOp as $type) { ?>
					  		  <option value="<?=$type['id']?>"><?=ucfirst($type['lib'])?></option>
					  		<?php } ?>
					  	</select>
					  </div>
					  <div class="col-sm-3">
					  	<label><?=ucfirst(get_phrase('pseudo du receveur'))?></label>
					  	 <input type="text" onkeyup="myFunction();" id="pseudo_r" name="pseudo_r" class="form-control">
					  </div>
					</div><br>
					<div class="row">
						<div class="col-sm-6">
							<button type="submit" class="btn btn-primary"><?=ucfirst(get_phrase('filtrer'))?></button>
						</div>
					</div>
					<br>
					<div class="panel-body">
                      <div class="table-wrap">
                     <table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>N<sup>o</sup></th>
								<th><?=ucfirst(get_phrase('type opération'))?></th>
								<th><?=ucfirst(get_phrase('montant'))?></th>
								<th><?=ucfirst(get_phrase('motif'))?></th>
								<th><?=ucfirst(get_phrase('date'))?></th>
								<th><?=ucfirst(get_phrase('receveur'))?></th>
								<th><?=ucfirst(get_phrase('mois année'))?></th>
							</tr>
						</thead>
						<tbody>
						<?php /*var_dump($mesoperations);die;*/ if(is_array($mesoperations)){ $i =1;?>
						  <?php foreach ($mesoperations as $monoperation) { 
						  	$name = $this->Crud_model->selectTypeOpById($monoperation['typeoperation'])['lib'];
						  ?>
							<tr>
							  <td><?=$i?></td>
							  <td><?=$name?></td>
							  <td><?php echo number_format(floatval(trim($monoperation['montant'])), 0, ' ', ' ');?> $</td>
							  <td><?=$monoperation['motif_oprt']?></td>
							  <td><?=date('d/m/Y', $monoperation['dateopration'])?></td>
							  <td><?=empty($monoperation['pseudo_receveur']) ? "master" : $monoperation['pseudo_receveur']?></td>
							  <td><?=$monoperation['mois_annee']?></td>
							</tr>
						  <?php $i++;} ?>
					    <?php } ?>
						</tbody>				  
					</table>
					</div>              
				</div>
				<!-- /.box-body -->
			  </div>
 </div>
</div>


<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("pseudo_r");
  filter = input.value.toUpperCase();
  table = document.getElementById("operation-table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>