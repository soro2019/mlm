<style type="text/css">
    .select2 {
    visibility: inherit;
}
</style>
<div class="box-header with-border">
  <h4 class="box-title"><?=ucfirst(get_phrase('write new message'))?></h4>
</div>
<div class="box-body">
    <form action="<?=site_url('backoffice/messagerie/send_new')?>" method="POST">
      <div class="row">
        <div class="col-md-12 col-12">
          <div class="form-group">
            <label><?=ucfirst(get_phrase('recipient'))?>:</label>
            <select class="form-control select2" required name="reciever" style="width: 100%;">
              <option selected="selected"><?=ucfirst(get_phrase('select a user'))?></option>
              <option value="<?=$membre['pseudo_parrain']?>"><?=$membre['pseudo_parrain']?></option>
              <?php if(count($mescontacts) > 0)
                {
                   foreach ($mescontacts as $moncontact) { ?>
                       <option value="<?=$moncontact['pseudo']?>"><?=$moncontact['pseudo']?></option> 
               <?php  } 
                }
               ?>
            </select>
          </div>
        </div> 
     </div><br>
     <div class="row">
        <div class="col-md-12 col-12">
            <textarea required name="message" class="textarea" placeholder="<?php echo ucfirst(get_phrase('write your message')); ?>"
            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
        </div>
     </div><br>
     <button type="submit" class="btn btn-success pull-right">
        <i class="fa fa-share"></i> &nbsp;<?php echo ucfirst(get_phrase('send message')); ?>
     </button>  
    </form>
</div>