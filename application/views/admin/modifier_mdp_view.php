
    <section class="content">

        <div class="row">
            
            <div class="col-md-12">
                <div class="nav-tabs-custom" id="element_overlap1">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#settings" data-toggle="tab">Changer votre mot de passe</a></li>
                    </ul>
                    <div class="tab-content">
                        
                        <div class="active tab-pane" id="settings">
                           <?php
                               if($this->session->flashdata('message') !== null){
                                   echo '<div class="alert alert-danger" role="alert">Erreur: ' .$this->session->flashdata('message').'</div>';
                               }
                               elseif($this->session->flashdata('message-bon') !== null){
                                   echo '<div class="alert alert-success" role="alert">' .$this->session->flashdata('message-bon').'</div>';
                               }  
                               
                            
                            echo form_open('',array('class' => 'form-horizontal UpdateDetails'));?>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Ancien mot de passe</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" required name="ancien" placeholder="Ancien mot de passe">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Nouveau</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" required name="nouveau" placeholder="Nouveau mot de passe">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail" required class="col-sm-2 control-label">Confirmer</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" required name="confirmer" placeholder="Confirmer le mot de passe
">
                                    </div>
                                </div>

                              
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">

                                        <button type="submit" name="modifier-mdp" class="btn bg-green ChangePassword">Modifier</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->

</div>