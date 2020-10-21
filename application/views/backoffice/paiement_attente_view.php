<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* Center the loader */
        
        #loader {
            position: absolute;
            left: 50%;
            top: 60%;
            z-index: 1;
            width: 150px;
            height: 150px;
            margin: -75px 0 0 -75px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #015283;
            width: 50px;
            height: 50px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }
        
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }
        
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        /* Add animation to "page content" */
        
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }
        
        @-webkit-keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }
            to {
                bottom: 0px;
                opacity: 1
            }
        }
        
        @keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }
            to {
                bottom: 0;
                opacity: 1
            }
        }
        
        #myDiv {
            display: none;
            text-align: center;
        }
        
        .centered {
            text-align: center;
        }
        
        .container {
            background-color: #f2f2f2;
            margin: 15px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
            font-family: open sans;
        }
        
        .well{
            padding-top:10px;
        }

    </style>
</head>

<body onload="myFunction()" style="margin:0;">
    <div class="container centered">
        <div class="well">
            <img src="<?php echo site_url('assets/membre/logo/logo-gie.png');?>" alt="">
            <h2>Votre paiement est en attente de confirmation.</h2>
            <p>Veuillez confirmer la transaction en composant le <b>*534#</b> à partir de votre numéro MTN money.</p>
        </div>
        <div id="loader"></div>
    </div>


</body>

</html>
