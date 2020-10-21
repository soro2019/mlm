<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title>
        <?php echo $page_title;?>
    </title>
    <style>
        
        body {
            font-family: 'Open Sans', sans-serif;
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
            padding: 15px 20px 15px 20px;
            color: white;
            border: 1px solid lightgrey;
            border-radius: 5px;
        }
        
        .container-green {
            background-color: green;
            padding: 15px 20px 15px 20px;
            color: white;
            border: 1px solid lightgrey;
            border-radius: 5px;
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
        
        select {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        
        input[type=password] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        
        input[type=date] {
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
    <div class="text-center">
        <img src="<?php echo site_url('assets/membre/logo/logo-gie.png');?>" alt="">
        <h2>Inscription à la matrice MLM de Global Industries Espoir</h2>
        <p>Veuillez remplir vos informations personnelles et valider votre achat</p>
        
        
        <?php
       if($this->session->flashdata('message_erreur') !== NULL){
           echo '<p class="container-red">Erreur : &nbsp;' .$this->session->flashdata('message_erreur').'</p>';
       }
         elseif($this->session->flashdata('message_erreur') == NULL && $this->uri->segment(1) == 'inscription-agence' && validation_errors() == ''){ ?>
         
            <p class="container-green">Bienvenue à l'espace d'inscription des membres de GLOBAL INDUSTRIES ESPOIR réservé au AGENCE</p>
                            
                          
                           
                           <?php   }  
       elseif($this->session->flashdata('message_erreur') == NULL && validation_errors() !== ''){
           echo validation_errors('<p class="container-red">Erreur : &nbsp;', '</p>');
       }
       else{ ?>
       
       <p class="container-green">Vous pouvez désormais vous inscrire. Si vous n'avez pas de parrain veuillez laisser le champ "pseudo parrain" vide. Nous vous remercions pour votre compréhension et RDV au sommet !</p>
       
      <?php     
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
                            <?php   if($this->uri->segment(2) == ''){ ?>
                            <label for="fname"><i class="fa fa-user"></i> Pseudo du parrain</label>
                            <input type="text" id="fname" name="pseudo_parrain" placeholder="Exemple: global" required>
                            <hr>
                            <?php }
                            else{ ?>
                            <label for="fname"><i class="fa fa-user"></i> Pseudo du parrain</label>
                            <input type="text" id="fname" name="pseudo_parrain" value="<?php echo $pseudo_parrain; ?>" readonly="readonly">
                            <hr>
                            <label for="fname"><i class="fa fa-user"></i> Nom du parrain</label>
                            <input type="text" id="fname" name="nom_parrain" value="<?php echo $nom_parrain; ?>" readonly="readonly">
                            <hr>
                            <?php    }
                           ?>

                            <br>
                            <label for="fname"><i class="fa fa-user-circle"></i> Nom</label>
                            <input type="text" id="fname" name="nom" placeholder="" required>
                            <label for="fname"><i class="fa fa-user-circle"></i> Prénoms</label>
                            <input type="text" id="fname" name="prenoms" placeholder="" required>
                            <label for="fname"><i class="fa fa-calendar"></i> Date de naissance</label>
                            <input type="date" id="fname" name="date" placeholder="" required>
                            <label for="fname"><i class="fa fa-map-marker"></i> Lieu de naissance</label>
                            <input type="text" id="fname" name="lieu" placeholder="" required>
                            <label for="fname"><i class="fa fa-user-plus"></i> Pseudo</label>
                            <input type="text" id="fname" name="pseudo" placeholder="" required>
                            <label for="fname"><i class="fa fa-key"></i> Mot de passe</label>
                            <input type="password" id="fname" name="password" placeholder="" required>
                            <label for="email"><i class="fa fa-flag"></i> Pays</label>
                            <select class="form-control" name="pays" required> 
                                            <option value="">Choisir</option>
                                            <option value="Côte d'Ivoire">Côte d'Ivoire </option>
                                            <option value="France">France </option>
                                            <option value="Afghanistan">Afghanistan </option>
                                            <option value="Afrique_Centrale">Afrique Centrale </option>
                                            <option value="Afrique_du_sud">Afrique du Sud </option> 
                                            <option value="Albanie">Albanie </option>
                                            <option value="Algerie">Algerie </option>
                                            <option value="Allemagne">Allemagne </option>
                                            <option value="Andorre">Andorre </option>
                                            <option value="Angola">Angola </option>
                                            <option value="Anguilla">Anguilla </option>
                                            <option value="Arabie_Saoudite">Arabie Saoudite </option>
                                            <option value="Argentine">Argentine </option>
                                            <option value="Armenie">Armenie </option> 
                                            <option value="Australie">Australie </option>
                                            <option value="Autriche">Autriche </option>
                                            <option value="Azerbaidjan">Azerbaidjan </option>

                                            <option value="Bahamas">Bahamas </option>
                                            <option value="Bangladesh">Bangladesh </option>
                                            <option value="Barbade">Barbade </option>
                                            <option value="Bahrein">Bahrein </option>
                                            <option value="Belgique">Belgique </option>
                                            <option value="Belize">Belize </option>
                                            <option value="Benin">Benin </option>
                                            <option value="Bermudes">Bermudes </option>
                                            <option value="Bielorussie">Bielorussie </option>
                                            <option value="Bolivie">Bolivie </option>
                                            <option value="Botswana">Botswana </option>
                                            <option value="Bhoutan">Bhoutan </option>
                                            <option value="Boznie_Herzegovine">Boznie Herzegovine </option>
                                            <option value="Bresil">Bresil </option>
                                            <option value="Brunei">Brunei </option>
                                            <option value="Bulgarie">Bulgarie </option>
                                            <option value="Burkina_Faso">Burkina Faso </option>
                                            <option value="Burundi">Burundi </option>

                                            <option value="Caiman">Caiman </option>
                                            <option value="Cambodge">Cambodge </option>
                                            <option value="Cameroun">Cameroun </option>
                                            <option value="Canada">Canada </option>
                                            <option value="Canaries">Canaries </option>
                                            <option value="Cap_vert">Cap_Vert </option>
                                            <option value="Chili">Chili </option>
                                            <option value="Chine">Chine </option> 
                                            <option value="Chypre">Chypre </option> 
                                            <option value="Colombie">Colombie </option>
                                            <option value="Comores">Colombie </option>
                                            <option value="Congo">Congo </option>
                                            <option value="Congo_democratique">Congo democratique </option>
                                            <option value="Cook">Cook </option>
                                            <option value="Coree_du_Nord">Coree du Nord </option>
                                            <option value="Coree_du_Sud">Coree du Sud </option>
                                            <option value="Costa_Rica">Costa Rica </option>
                                            <option value="Ivoirienne">Côte d'Ivoire </option>
                                            <option value="Croatie">Croatie </option>
                                            <option value="Cuba">Cuba </option>

                                            <option value="Danemark">Danemark </option>
                                            <option value="Djibouti">Djibouti </option>
                                            <option value="Dominique">Dominique </option>

                                            <option value="Egypte">Egypte </option> 
                                            <option value="Emirats_Arabes_Unis">Emirats Arabes Unis </option>
                                            <option value="Equateur">Equateur </option>
                                            <option value="Erythree">Erythree </option>
                                            <option value="Espagne">Espagne </option>
                                            <option value="Estonie">Estonie </option>
                                            <option value="Etats_Unis">Etats-Unis </option>
                                            <option value="Ethiopie">Ethiopie </option>

                                            <option value="Falkland">Falkland </option>
                                            <option value="Feroe">Feroe </option>
                                            <option value="Fidji">Fidji </option>
                                            <option value="Finlande">Finlande </option>
                                            <option value="France">France </option>

                                            <option value="Gabon">Gabon </option>
                                            <option value="Gambie">Gambie </option>
                                            <option value="Georgie">Georgie </option>
                                            <option value="Ghana">Ghana </option>
                                            <option value="Gibraltar">Gibraltar </option>
                                            <option value="Grece">Grece </option>
                                            <option value="Grenade">Grenade </option>
                                            <option value="Groenland">Groenland </option>
                                            <option value="Guadeloupe">Guadeloupe </option>
                                            <option value="Guam">Guam </option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guernesey">Guernesey </option>
                                            <option value="Guinee">Guinee </option>
                                            <option value="Guinee_Bissau">Guinee-Bissau </option>
                                            <option value="Guinee equatoriale">Guinee Equatoriale </option>
                                            <option value="Guyana">Guyana </option>
                                            <option value="Guyane_Francaise ">Guyane Francaise </option>

                                            <option value="Haiti">Haiti </option>
                                            <option value="Hawaii">Hawaii </option> 
                                            <option value="Honduras">Honduras </option>
                                            <option value="Hong_Kong">Hong-Kong </option>
                                            <option value="Hongrie">Hongrie </option>

                                            <option value="Inde">Inde </option>
                                            <option value="Indonesie">Indonesie </option>
                                            <option value="Iran">Iran </option>
                                            <option value="Iraq">Iraq </option>
                                            <option value="Irlande">Irlande </option>
                                            <option value="Islande">Islande </option>
                                            <option value="Israel">Israel </option>
                                            <option value="Italie">Italie </option>

                                            <option value="Jamaique">Jamaique </option>
                                            <option value="Jan Mayen">Jan Mayen </option>
                                            <option value="Japon">Japon </option>
                                            <option value="Jersey">Jersey </option>
                                            <option value="Jordanie">Jordanie </option>

                                            <option value="Kazakhstan">Kazakhstan </option>
                                            <option value="Kenya">Kenya </option>
                                            <option value="Kirghizstan">Kirghizistan </option>
                                            <option value="Kiribati">Kiribati </option>
                                            <option value="Koweit">Koweit </option>

                                            <option value="Laos">Laos </option>
                                            <option value="Lesotho">Lesotho </option>
                                            <option value="Lettonie">Lettonie </option>
                                            <option value="Liban">Liban </option>
                                            <option value="Liberia">Liberia </option>
                                            <option value="Liechtenstein">Liechtenstein </option>
                                            <option value="Lituanie">Lituanie </option> 
                                            <option value="Luxembourg">Luxembourg </option>
                                            <option value="Lybie">Lybie </option>

                                            <option value="Macao">Macao </option>
                                            <option value="Macedoine">Macedoine </option>
                                            <option value="Madagascar">Madagascar </option>
                                            <option value="Madère">Madère </option>
                                            <option value="Malaisie">Malaisie </option>
                                            <option value="Malawi">Malawi </option>
                                            <option value="Maldives">Maldives </option>
                                            <option value="Mali">Mali </option>
                                            <option value="Malte">Malte </option>
                                            <option value="Man">Man </option>
                                            <option value="Mariannes du Nord">Mariannes du Nord </option>
                                            <option value="Maroc">Maroc </option>
                                            <option value="Marshall">Marshall </option>
                                            <option value="Martinique">Martinique </option>
                                            <option value="Maurice">Maurice </option>
                                            <option value="Mauritanie">Mauritanie </option>
                                            <option value="Mayotte">Mayotte </option>
                                            <option value="Mexique">Mexique </option>
                                            <option value="Micronesie">Micronesie </option>
                                            <option value="Midway">Midway </option>
                                            <option value="Moldavie">Moldavie </option>
                                            <option value="Monaco">Monaco </option>
                                            <option value="Mongolie">Mongolie </option>
                                            <option value="Montserrat">Montserrat </option>
                                            <option value="Mozambique">Mozambique </option>

                                            <option value="Namibie">Namibie </option>
                                            <option value="Nauru">Nauru </option>
                                            <option value="Nepal">Nepal </option>
                                            <option value="Nicaragua">Nicaragua </option>
                                            <option value="Niger">Niger </option>
                                            <option value="Nigeria">Nigeria </option>
                                            <option value="Niue">Niue </option>
                                            <option value="Norfolk">Norfolk </option>
                                            <option value="Norvege">Norvege </option>
                                            <option value="Nouvelle_Caledonie">Nouvelle Caledonie </option>
                                            <option value="Nouvelle_Zelande">Nouvelle Zelande </option>

                                            <option value="Oman">Oman </option>
                                            <option value="Ouganda">Ouganda </option>
                                            <option value="Ouzbekistan">Ouzbekistan </option>

                                            <option value="Pakistan">Pakistan </option>
                                            <option value="Palau">Palau </option>
                                            <option value="Palestine">Palestine </option>
                                            <option value="Panama">Panama </option>
                                            <option value="Papouasie_Nouvelle_Guinee">Papouasie Nouvelle Guinee </option>
                                            <option value="Paraguay">Paraguay </option>
                                            <option value="Pays_Bas">Pays-Bas </option>
                                            <option value="Perou">Perou </option>
                                            <option value="Philippines">Philippines </option> 
                                            <option value="Pologne">Pologne </option>
                                            <option value="Polynesie">Polynesie </option>
                                            <option value="Porto_Rico">Porto Rico </option>
                                            <option value="Portugal">Portugal </option>

                                            <option value="Qatar">Qatar </option>

                                            <option value="Republique_Dominicaine">Republique Dominicaine </option>
                                            <option value="Republique_Tcheque">Republique Tcheque </option>
                                            <option value="Reunion">Reunion </option>
                                            <option value="Roumanie">Roumanie </option>
                                            <option value="Royaume_Uni">Royaume-Uni </option>
                                            <option value="Russie">Russie </option>
                                            <option value="Rwanda">Rwanda </option>

                                            <option value="Sahara Occidental">Sahara Occidental </option>
                                            <option value="Sainte_Lucie">Sainte Lucie </option>
                                            <option value="Saint_Marin">Saint Marin </option>
                                            <option value="Salomon">Salomon </option>
                                            <option value="Salvador">Salvador </option>
                                            <option value="Samoa_Occidentales">Samoa Occidentales</option>
                                            <option value="Samoa_Americaine">Samoa Americaine </option>
                                            <option value="Sao_Tome_et_Principe">Sao Tome_et Principe </option> 
                                            <option value="Senegal">Senegal </option> 
                                            <option value="Seychelles">Seychelles </option>
                                            <option value="Sierra Leone">Sierra-Leone </option>
                                            <option value="Singapour">Singapour </option>
                                            <option value="Slovaquie">Slovaquie </option>
                                            <option value="Slovenie">Slovenie</option>
                                            <option value="Somalie">Somalie </option>
                                            <option value="Soudan">Soudan </option> 
                                            <option value="Sri_Lanka">Sri-Lanka </option> 
                                            <option value="Suede">Suede </option>
                                            <option value="Suisse">Suisse </option>
                                            <option value="Surinam">Surinam </option>
                                            <option value="Swaziland">Swaziland </option>
                                            <option value="Syrie">Syrie </option>

                                            <option value="Tadjikistan">Tadjikistan </option>
                                            <option value="Taiwan">Taiwan </option>
                                            <option value="Tonga">Tonga </option>
                                            <option value="Tanzanie">Tanzanie </option>
                                            <option value="Tchad">Tchad </option>
                                            <option value="Thailande">Thailande </option>
                                            <option value="Tibet">Tibet </option>
                                            <option value="Timor_Oriental">Timor Oriental </option>
                                            <option value="Togo">Togo </option> 
                                            <option value="Trinite_et_Tobago">Trinite et Tobago </option>
                                            <option value="Tristan da cunha">Tristan de cuncha </option>
                                            <option value="Tunisie">Tunisie </option>
                                            <option value="Turkmenistan">Turmenistan </option> 
                                            <option value="Turquie">Turquie </option>

                                            <option value="Ukraine">Ukraine </option>
                                            <option value="Uruguay">Uruguay </option>

                                            <option value="Vanuatu">Vanuatu </option>
                                            <option value="Vatican">Vatican </option>
                                            <option value="Venezuela">Venezuela </option>
                                            <option value="Vierges_Americaines">Vierges Americaines </option>
                                            <option value="Vierges_Britanniques">Vierges Britanniques </option>
                                            <option value="Vietnam">Vietnam </option>

                                            <option value="Wake">Wake </option>
                                            <option value="Wallis et Futuma">Wallis et Futuma </option>

                                            <option value="Yemen">Yemen </option>
                                            <option value="Yougoslavie">Yougoslavie </option>

                                            <option value="Zambie">Zambie </option>
                                            <option value="Zimbabwe">Zimbabwe </option>

                                        </select>
                            <label for="email"><i class="fa fa-phone"></i> Téléphone</label>
                            <input type="text" id="telephone" name="telephone" placeholder="Exemple: 22520003052" required>
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="" required>
                            <label for="city"><i class="fa fa-institution"></i> Ville</label>
                            <input type="text" id="city" name="ville" placeholder="" required>
                            <label for="adr"><i class="fa fa-address-card-o"></i> Adresse</label>
                            <input type="text" id="adr" name="adresse" placeholder="" required>

                        </div>

                        <div class="col-50">
                            
                            
                            <?php     if($this->uri->segment(1) == 'inscription-offline'){ ?>
                            <br><br><br>
                            <label for="cname"><i class="fa fa-mobile"></i> Votre code d'inscription offline</label>
                            <input type="text" id="cname" name="num_money" placeholder="Exemple: 12152255623235662656" required>
                                <label for="cname"><i class="fa fa-mobile"></i> Mode de réception</label>
                                <select class="form-control" name="offline-i" required> 
                                                <option value="">Choisir</option>
                                                <option value="espoir">Grand</option>
                                                <option value="jordy">Petit</option>
                                                <option value="cash">Cash</option>
                                            </select>
                          
                           
                           <?php   }  elseif($this->uri->segment(1) == 'inscription-agence'){ ?>
                           <br><br><br>
                           <label for="cname"><i class="fa fa-mobile"></i> Votre Code agence</label>
                           <input type="text" id="cname" name="code_agence" placeholder="Exemple: 45125475514876hddgz745" required>
                            
                          <?php   }  elseif($this->uri->segment(1) == 'inscription-freelance'){ ?>
                           <br><br><br>
                           <label for="cname"><i class="fa fa-mobile"></i> Votre Code freelance</label>
                           <input type="text" id="cname" name="code_freelance" placeholder="Exemple: 45125475514876hddgz745" required>
                            
                           
                           <?php   }  else{ ?>
                           <h3>Mode de paiement</h3>
                            <label for="fname">Actuellement les paiements sont possibles par ORANGE MONEY CI, MTN MONEY CI et MOOV MONEY CI </label>
                            <div class="icon-container">
                                <img src="<?php echo site_url('assets/membre/logo/paiement-mobile.png');?>" alt="" height="50px">
                            </div>
                                <label for="cname"><i class="fa fa-mobile"></i> Votre numéro mobile money</label>
                            <input type="text" id="cname" name="num_money" placeholder="Exemple: 22546002000" required>
                            <?php    }
                           ?>

                        </div>

                    </div>
                    <label>
          La livraison se fera à l'adresse indiquée 
        </label>
                    <input type="submit" name="inscription" value="Continuer votre achat pour vous inscrire" class="btn">
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
