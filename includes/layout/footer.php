<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="container-fluid piedPage">
        <div class="row">
            <div class="col-12 col-sm-12	col-md-12 col-lg-12 col-xl-12  mcmp text-center"><h2><span>M</span>oto<span> C</span>lub <span>M</span>illau<span> P</span>ASSION</span></h2></div>
        </div>

        <div class="row">


            <div class="col-3">

                <!-- weather widget start -->
                <!-- widget meteo -->
                <div id="widget_88fa3ad583f964cae1eb19e46f30b5da" style=" border: none;" class="meteo">
                    <span id="t_88fa3ad583f964cae1eb19e46f30b5da">Météo Millau</span>
                    <span id="l_88fa3ad583f964cae1eb19e46f30b5da"><a href="http://www.mymeteo.info/r/millau_h">https://www.my-meteo.com</a></span>
                    <script>
                        (function() {
                            var my = document.createElement("script"); my.type = "text/javascript"; my.async = true;
                            my.src = "https://services.my-meteo.com/widget/js?ville=4718&format=vertical&nb_jours=1&temps&icones&vent&c1=393939&c2=a9a9a9&c3=e6e6e6&c4=000000&c5=00d2ff&c6=d21515&police=0&t_icones=1&x=160&y=95&d=0&id=88fa3ad583f964cae1eb19e46f30b5da";
                            var z = document.getElementsByTagName("script")[0]; z.parentNode.insertBefore(my, z);
                        })();
                    </script>
                </div>
            </div>
            <!-- widget meteo -->

            <div class="col-3">

                <img src="./img/logo/logo3.png" alt="">
            </div>
            <div class="col-6">
                <div class="footer-text">
                    <div class="reserved"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p><a href="page-reglement" class="text-capitalize">Reglement</a> / Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | Crée  par <a >Moto Club Millau Passion </a>

                        </p>
                        <ul>
                            <?php

                            foreach ($ar_pages_var as $key=>$value ){
                                if($ar_pages_var[$key]['PUBLIC'] == 1 ){
                                    echo '<li><a href="page-'.$ar_pages_var[$key]['KEY_TITLE'].'">'.$ar_pages_var[$key]['KEY_TITLE'] .' </a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="search-model">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <div class="search-close-switch">+</div>
                            <form class="search-model-form">
                                <input type="text" id="search-input" placeholder="Search here.....">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</footer>
<!-- Footer Section End -->


<!-- Js Plugins -->
<script src="./js/jquery-3.3.1.min.js" ></script>
<!-- Mes plugins Plugins -->
<script src="./js/popper.1.14-3.min.js" ></script>
<!-- -->
<script src="./js/bootstrap.min.js" ></script>
<script src="./js/jquery.magnific-popup.min.js" ></script><!-- cercles page éléments -->
<script src="./js/jquery.slicknav.js" ></script> <!-- cercles page éléments -->
<script src="./js/owl.carousel.min.js" ></script><!-- caroussel accueil -->
<script src="./js/circle-progress.min.js" ></script> <!-- cercles page éléments -->
<!-- Js openstreetmap -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin="" ></script>
<!-- Js Wysiwyg -->
<script src="./vendor/summernote-0.8.18-dist/summernote-bs4.js" ></script>
<script src="./js/highlight.min.js" ></script>
<script src="./js/wysiwyg.min.js" ></script>
<script src="./js/slick.min.js" ></script>
<!-- Js Aggrandissement photo -->


<script src="./js/main.js?v=1.0" ></script>
</body>

</html>
