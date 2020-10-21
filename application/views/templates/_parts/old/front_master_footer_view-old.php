<!-- footer -->
<div class="footer_agile_w3ls">
    <div class="container">
        <div class="agileits_w3layouts_logo logo2">
            <h2>
                <img src="<?php echo site_url('assets/front/images/Logo-GIE-petit.png');?>" height="150" alt="GIE">
            </h2>
            <div class="agileits-social">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
            </div>
            <br>
            <div id="sfcbr5p5kmw43sgcu9uxmzs4s824bjnpft9"></div>
<script type="text/javascript" src="https://counter4.whocame.ovh/private/counter.js?c=br5p5kmw43sgcu9uxmzs4s824bjnpft9&down=async" async></script>
<noscript><a href="https://www.compteurdevisite.com" title="compteur pour site"><img src="https://counter4.whocame.ovh/private/compteurdevisite.php?c=br5p5kmw43sgcu9uxmzs4s824bjnpft9" border="0" title="compteur pour site" alt="compteur pour site"></a></noscript>

        </div>
    </div>
</div>
<div class="wthree_copy_right">
    <div class="container">
        <p>© 2018 Global Industries Espoir. Tous droits réservés | Design par <a href="http://jemdesign.tk/">JEMDESIGN</a></p>
    </div>
</div>
<!-- //footer -->



<!-- Modal Temporaire -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">LANCEMENT OFFICIEL DE GLOBAL INDUSTRIES ESPOIR</h4>
      </div>-->
      
      <div class="modal-body">
        <p>La première présentation de Global Industries Espoir est prévue tout à l'heure à 16h00 à Yopougon Sideci - Cabine Bleue. <br><b>Salle Jules Vouzon.</b> <br> Nous vous invitons à venir assister à cette conférence qui sera animée par Monsieur Espoir Abodje, PDG de GLOBAL INDUSTRIES ESPOIR. <br>  </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>





<!-- js -->
<script type="text/javascript" src="<?php echo site_url('assets/front/js/jquery-2.1.4.min.js');?>"></script>
<!-- //js -->
<!-- Counter required files -->
<script type="text/javascript" src="<?php echo site_url('assets/front/js/dscountdown.min.js');?>"></script>
<script src="<?php echo site_url('assets/front/js/demo-1.js');?>"></script>
<script>
    jQuery(document).ready(function($) {
        $('.demo2').dsCountDown({
            endDate: new Date("December 24, 2020 23:59:00"),
            theme: 'black'
        });
    });

</script>
<!-- //Counter required files -->



<script src="<?php echo site_url('assets/front/js/mainScript.js');?>"></script>
<script src="<?php echo site_url('assets/front/js/rgbSlide.min.js');?>"></script>
<!-- carousal -->
<script src="<?php echo site_url('assets/front/js/slick.js');?>" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(document).on('ready', function() {
        $(".center").slick({
            dots: true,
            infinite: true,
            centerMode: true,
            slidesToShow: 2,
            slidesToScroll: 2,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        arrows: true,
                        centerMode: false,
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: true,
                        centerMode: false,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]
        });
    });

</script>
<!-- //carousal -->
<!-- flexisel -->
<script type="text/javascript">
    $(window).load(function() {
        $("#flexiselDemo1").flexisel({
            visibleItems: 4,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 2
                }
            }
        });

    });

</script>
<script type="text/javascript" src="<?php echo site_url('assets/front/js/jquery.flexisel.js');?>"></script>
<!-- //flexisel -->
<!-- gallery-pop-up -->
<script src="<?php echo site_url('assets/front/js/lsb.min.js');?>"></script>
<script>
    $(window).load(function() {
        $.fn.lightspeedBox();
    });

</script>
<!-- //gallery-pop-up -->
<!-- flexSlider -->
<script defer src="<?php echo site_url('assets/front/js/jquery.flexslider.js');?>"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });
    });

</script>
<!-- //flexSlider -->

<!-- start-smooth-scrolling -->
<script type="text/javascript" src="<?php echo site_url('assets/front/js/move-top.js');?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/front/js/easing.js');?>"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });

</script>
<!-- start-smooth-scrolling -->
<!-- for bootstrap working -->
<script src="<?php echo site_url('assets/front/js/bootstrap.js');?>"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
        	var defaults = {
        	containerID: 'toTop', // fading element id
        	containerHoverID: 'toTopHover', // fading element hover id
        	scrollSpeed: 1200,
        	easingType: 'linear' 
        	};
        */

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });

</script>
<!-- //here ends scrolling icon -->


<!--===============================================================================================-->

<!--===============================================================================================-->
<script src="<?php echo site_url('assets/front/vendor/bootstrap/js/popper.js');?>"></script>

<!--===============================================================================================-->
<script src="<?php echo site_url('assets/front/vendor/select2/select2.min.js');?>"></script>
<!--===============================================================================================-->
<script src="<?php echo site_url('assets/front/vendor/js/main.js');?>"></script>

</body>

</html>
