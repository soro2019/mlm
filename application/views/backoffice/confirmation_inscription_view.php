<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?php echo $page_title;?></title>
    <style>
        body {
            font-family: Arial;
            font-size: 15px;
            padding: 8px;
        }
        
        * {
            box-sizing: border-box;
        }
        
        .row {
            display: -ms-flexbox;
            /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap;
            /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }
        
        .col-25 {
            -ms-flex: 25%;
            /* IE10 */
            flex: 25%;
        }
        
        .col-50 {
            -ms-flex: 50%;
            /* IE10 */
            flex: 50%;
        }
        
        .col-75 {
            -ms-flex: 75%;
            /* IE10 */
            flex: 75%;
        }
        
        .col-25,
        .col-50,
        .col-75 {
            padding: 0 16px;
        }
        
        .container {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }
        
        .container-red {
            background-color: red;
            padding: 5px 20px 15px 20px;
            color:white;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }
        
        .container2 {
            background-color: transparent;
            padding: 5px 40px 15px 40px;
        }
        
        input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        
        label {
            margin-bottom: 10px;
            display: block;
        }
        
        .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }
        
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            margin: 10px 0;
            background-color: #005283;
            border-color: #FE0C0A;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }
        
        .btn:hover {
            background-color: #FE0C0A;
        }
        
        a {
            color: #2196F3;
        }
        
        hr {
            border: 1px solid lightgrey;
        }
        
        span.price {
            float: right;
            color: grey;
        }
        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
        
        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }
            .col-25 {
                margin-bottom: 20px;
            }
        }
        
        .text-center {
            text-align: center;
        }

    </style>
</head>

<body>
  <?php //var_dump($this->session->userdata('result'));  ?>
   <div class="text-center">
    <img src="<?php echo site_url('assets/membre/logo/logo-gie.png');?>" alt="">
    <h2>Confirmation de l'inscription à la matrice MLM de Global Industries Espoir</h2>
    <p>Veuillez vérifier les informations ci-dessous avant de procéder au paiement</p>
    <?php
       if($this->session->flashdata('message_erreur') !== null){
           echo '<p class="container-red">Erreur :' .$this->session->flashdata('message_erreur')."</p>";
       }
    ?>
    </div>
    <div class="container2">
    <div class="row">
        <div class="col-75">
            <div class="container">
                <?php echo form_open('',array());?>

                    <div class="row">
                        <div class="col-50">
                            <h3>Informations personnelles</h3>
                            <label for="fname"><i class="fa fa-user"></i> Pseudo du parrain</label>
                            <input type="text" id="fname" name="pseudo_parrain" value="<?php echo $this->session->userdata('pseudo_parrain'); ?>" readonly="readonly">
                            <hr>
                            <label for="fname"><i class="fa fa-user"></i> Nom du parrain</label>
                            <input type="text" id="fname" name="pseudo_parrain" value="<?php echo $this->session->userdata('parrain_inscrit'); ?>" readonly="readonly">
                            <hr>
                            <br>
                            <label for="fname"><i class="fa fa-user"></i> Nom</label>
                            <input type="text" id="fname" name="nom" value="<?php echo $this->session->userdata('nom'); ?>" disabled>
                            <label for="fname"><i class="fa fa-user"></i> Prénoms</label>
                            <input type="text" id="fname" name="prenoms" value="<?php echo $this->session->userdata('prenoms'); ?>" disabled>
                            <label for="fname"><i class="fa fa-user"></i> Pseudo</label>
                            <input type="text" id="fname" name="prenoms" value="<?php echo $this->session->userdata('pseudo'); ?>" disabled>
                            <label for="fname"><i class="fa fa-key"></i> Mot de passe</label>
                            <input type="text" id="fname" name="password" value="<?php echo $this->session->userdata('password'); ?>" disabled>
                            <label for="email"><i class="fa fa-flag"></i> Pays</label>
                            <input type="text" id="email" name="pays" value="<?php echo $this->session->userdata('pays'); ?>" disabled>
                            <label for="email"><i class="fa fa-envelope"></i> Téléphone</label>
                            <input type="text" id="email" name="telephone" value="<?php echo $this->session->userdata('telephone'); ?>" disabled>
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" value="<?php echo $this->session->userdata('email'); ?>" disabled>
                            <label for="city"><i class="fa fa-institution"></i> Ville</label>
                            <input type="text" id="city" name="ville" value="<?php echo $this->session->userdata('ville'); ?>" disabled>
                            <label for="adr"><i class="fa fa-address-card-o"></i> Adresse</label>
                            <input type="text" id="adr" name="adresse" value="<?php echo $this->session->userdata('adresse'); ?>" disabled>
                            <input type="hidden" name="confirmation" value="True" />
                        </div>

                        <div class="col-50">
                            
                            
                            <?php     if($this->uri->segment(1) == 'confirmation-offline'){ ?>
                            <br><br><br>
                            <label for="cname"><i class="fa fa-mobile"></i> Votre code d'inscription offline</label>
                            <input type="text" id="cname" name="num_money" value="<?php echo $this->session->userdata('num_money'); ?>" disabled>
                                
                           
                           <?php   }  elseif($this->uri->segment(1) == 'confirmation-agence'){ ?>
                           <br><br><br>
                           <label for="cname"><i class="fa fa-mobile"></i> Votre Code agence</label>
                           <input type="text" id="cname" name="code_agence" value="<?php echo $this->session->userdata('code_agence'); ?>" disabled>
                            
                          <?php   }  elseif($this->uri->segment(1) == 'confirmation-freelance'){ ?>
                           <br><br><br>
                           <label for="cname"><i class="fa fa-mobile"></i> Votre Code freelance</label>
                           <input type="text" id="cname" name="code_freelance" value="<?php echo $this->session->userdata('code_freelance'); ?>" disabled>
                           
                           <?php   }  else{ ?>
                           <h3>Mode de paiement</h3>
                            <label for="fname">Actuellement les paiements sont possibles par ORANGE MONEY CI, MTN MONEY CI et MOOV MONEY CI </label>
                            <div class="icon-container">
                                <img src="<?php echo site_url('assets/membre/logo/paiement-mobile.png');?>" alt="" height="50px">
                            </div>
                            <label for="cname"><i class="fa fa-mobile"></i> Votre numéro mobile money</label>
                            <input type="text" id="cname" name="num_money" value="<?php echo $this->session->userdata('num_money'); ?>" disabled>
                            <?php    }
                           ?>
                            
                            
                           
                        </div>

                    </div>
                    <label>
          La livraison se fera à l'adresse indiquée 
        </label>
                    <input type="submit" value="Continuer votre achat pour vous inscrire" class="btn">
                </form>
            </div>
        </div>
        <div class="col-25">
            <div class="container">
                <h4>Votre achat <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>3</b></span></h4>
<!--                <p><a href="#">CAFO VITA</a> <span class="price"></span></p>-->
                    <p>CAFO VITA <span class="price"></span></p>
                <hr>
                <p>Total <span class="price" style="color:black"><b>12 600 FCFA</b></span></p>
            </div>
        </div>
    </div>
    </div>

</body>

</html>
