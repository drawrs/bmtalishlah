<div class="banner">
    <div class="container">
<!-- responsiveslides -->
                    <script src="{{URL::to('js/responsiveslides.min.js')}}"></script>
                        <script>
                            // You can also use "$(window).load(function() {"
                            $(function () {
                             // Slideshow 4
                            $("#slider3").responsiveSlides({
                                auto: true,
                                pager: false,
                                nav: true,
                                speed: 500,
                                namespace: "callbacks",
                                before: function () {
                            $('.events').append("<li>before event fired.</li>");
                            },
                            after: function () {
                                $('.events').append("<li>after event fired.</li>");
                                }
                                });
                                });
                        </script>
            <!-- responsiveslides -->
        <div  id="top" class="callbacks_container">
                    <ul class="rslides" id="slider3">
                        <li>
                            <div class="banner-info">
                                <div class="bann-top" style="background: url(images/slide/2.jpg) no-repeat 0px 0px; background-size:100%;">
                                    <div class="banner-right">
                                        <div class="bann-pad">
                                              <h1>Building Business Relationships That Last</h1>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi interdum 
                                              consequat molestie. Donec lorem ipsum, tempor sed rhoncus viverra, fermentum 
                                              in est. Suspendisse potenti. Nunc feugiat dapibus lorem, sit amet tempus tellus varius at. </p>
                                              <a href="services.html">Read More</a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="banner-info">
                                <div class="bann-top" style="background: url(images/slide/1.jpg) no-repeat 0px 0px; background-size:100%;">
                                    <div class="banner-right">
                                        <div class="bann-pad">
                                              <h1>Pembiayaan Perumahan</h1>
                                              <p>Nunc feugiat dapibus lorem, sit amet tempus tellus varius at 
                                              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi interdum 
                                              consequat molestie. Donec lorem ipsum, tempor sed rhoncus viverra, fermentum 
                                              in est. Suspendisse potenti.</p>
                                             <a href="#">Read More</a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="banner-info">
                                <div class="bann-top" style="background: url(images/slide/3.jpg) no-repeat 0px 0px; background-size:100%;">
                                    <div class="banner-right">
                                        <div class="bann-pad">
                                              <h1>Qurban AL-ISHLAH</h1>
                                              <p>Nunc feugiat dapibus lorem, sit amet tempus tellus varius at 
                                              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi interdum 
                                              consequat molestie. Donec lorem ipsum, tempor sed rhoncus viverra, fermentum 
                                              in est. Suspendisse potenti.</p>
                                             <a href="#">Read More</a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </li>
                    </ul>
        </div>
    </div>
</div>