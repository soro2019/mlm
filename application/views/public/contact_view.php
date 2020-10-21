<!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box ttm-textcolor-white">
                            <div class="page-title-heading">
                                <h1 class="title"><?=$page_title;?></h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="<?php echo site_url();?>"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep">&nbsp; | &nbsp;</span>
                                <span><?=$page_title;?></span>
                            </div>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- page-title end-->
        <!--site-main start-->
    <div class="site-main">

        <!-- map-section -->
        <div class="ttm-row map-section clearfix">
            <div class="container">
                <div class="row">
                        <div class="col-md-12">
                        <!--map-start-->
                        <div class="map-wrapper">
                            <!-- <script type="text/javascript">
                                var map;
                                function initMap() {
                                  map = new google.maps.Map(document.getElementById("map"), {
                                    center: { lat: -34.397, lng: 150.644 },
                                    zoom: 8
                                  });
                                }
                            </script> -->
                            <style type="text/css">
                                /* Always set the map height explicitly to define the size of the div
                                       * element that contains the map. */
                                #map, iframe {
                                  height: 100%;
                                }

                                /* Optional: Makes the sample page fill the window. */
                                html,
                                body {
                                  height: 100%;
                                  margin: 0;
                                  padding: 0;
                                }
                            </style>
                            <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
                            <script
                              src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=&v=weekly"
                              defer
                            ></script>
                            <div id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2805244.1745767146!2d-86.32675167439648!3d29.383165774894163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88c1766591562abf%3A0xf72e13d35bc74ed0!2sFlorida%2C+USA!5e0!3m2!1sen!2sin!4v1501665415329" width="100%" height="100" frameborder="0" style="border:0" allowfullscreen=""></iframe></div>
                        </div>
                        <!--map-end-->
                    </div>
                </div>
            </div>
        </div>
        <!-- map-section end -->
        <!-- contact-form-section -->
        <section class="ttm-row contact-form-section clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="spacing-6 clearfix">
                            <!-- section title -->
                            <div class="section-title clearfix">
                                <div class="title-header">
                                    <h3 class="title">We are always happy to chat with our investors</h3>
                                </div>
                            </div><!-- section title end -->
                            <ul class="ttm_contact_widget_wrapper">
                                <li>
                                    <h6>Address</h6>
                                    <i class="ttm-textcolor-skincolor ti ti-location-pin"></i>
                                    <span>1067 Shanghai St, Mong Kok, Hong Kong</span>
                                </li>
                                <li>
                                    <h6>Email for General Purposes</h6>
                                    <i class="ttm-textcolor-skincolor ti ti-comment"></i>
                                    <span><a href="mailto:info@shappinvest.org">info@shappinvest.org</a></span>
                                </li>
                                <li>
                                    <h6>Email of Investors Service</h6>
                                    <i class="ttm-textcolor-skincolor ti ti-comment"></i>
                                    <span><a href="mailto:investors_service@shappinvest.org">investors_service@shappinvest.org</a></span>
                                </li>
                                <li>
                                    <h6>Email for Partnership</h6>
                                    <i class="ttm-textcolor-skincolor ti ti-comment"></i>
                                    <span><a href="mailto:partnership@shappinvest.org">partnership@shappinvest.org</a></span>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="map-col-bg ttm-bgcolor-skincolor spacing-7">
                            <!-- section title -->
                            <div class="section-title text-left with-desc clearfix">
                                <div class="title-header">
                                    <h2 class="title">Let’s Start <br> The Conversation.</h2>
                                </div>
                            </div><!-- section title end -->
                            <form id="ttm-contactform" class="ttm-contactform wrap-form clearfix" method="POST" action="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>
                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                            <span class="text-input">
                                                <input name="your-name" type="text" value="" placeholder="Your Name" required="required">
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label>
                                            <span class="text-input">
                                                <input name="email" type="email" value="" placeholder="Your Email" required="required">
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>
                                            <span class="text-input">
                                                <input name="your-phone" type="text" value="" placeholder="Your Phone" required="required">
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label>
                                            <span class="text-input">
                                                <input name="subject" type="text" value="" placeholder="Subject" required="required">
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <label>
                                    <span class="text-input">
                                        <textarea name="message" cols="40" rows="3" placeholder="Message" required="required"></textarea>
                                    </span>
                                </label>
                                <input name="submit" type="submit" id="submit" class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-bgcolor-darkgrey" value="MAKE A RESERVATION">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-form-section END-->
    </div><!--site-main end-->
